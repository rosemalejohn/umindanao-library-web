<template>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption caption-md font-red-sunglo">
						<i class="icon-bar-chart theme-font hide"></i>
						<span class="caption-subject theme-font bold uppercase">Member Activity</span>
						<span class="caption-helper hide">weekly stats...</span>
					</div>
					<div class="actions">
						<div class="btn-group">
							<a href="#" class="btn grey-salsa btn-circle btn-sm dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" aria-expanded="true">
							Filter type&nbsp;<span class="fa fa-angle-down">
							</span>
							</a>
							<ul class="dropdown-menu pull-right">
								<li @click="data = members">
									<a href="javascript:;">All members</a>
								</li>
								<li @click="data = faculties">
									<a href="javascript:;">Faculties
									</a>
								</li>
								<li @click="data = students">
									<a href="javascript:;">Students
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="portlet-body">
					<div class="row number-stats margin-bottom-30">
						<div class="col-md-4">
							<div class="stat-right">
								<div class="stat-chart">
									<div id="sparkline_bar"></div>
								</div>
								<div class="stat-number">
									<div class="title">
										Total
									</div>
									<div class="number">
										{{ members.length }}
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="stat-right">
								<div class="stat-chart">
									<div id="sparkline_bar2"></div>
								</div>
								<div class="stat-number">
									<div class="title">
										Students
									</div>
									<div class="number">
										{{ students.length }}
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="stat-left">
								<div class="stat-chart">
									<div id="sparkline_bar2"></div>
								</div>
								<div class="stat-number">
									<div class="title">
										 Faculties
									</div>
									<div class="number">
										{{ faculties.length }}
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="table-scrollable table-scrollable-borderless">
						<table class="table table-hover table-light">
						<thead>
						<tr class="uppercase">
							<th>
								NAME
							</th>
							<th>
								TYPE
							</th>
							<th>
								COURSE
							</th>
							<th>
								COLLEGE
							</th>
							<th>
								DATE JOINED
							</th>
							<th></th>
						</tr>
						</thead>
							<tr v-for="member in data" track-by="$index">
								<td>
									{{ member.full_name }}
								</td>
								<td>
									<span class="label label-sm label-warning">
										{{ member.type }}
									</span>
								</td>
								<td>
									{{ member.course ? member.course.name : 'N/A' }}
								</td>
								<td>
									{{ member.college ? member.college.name : 'N/A' }}
								</td>
								<td>
									{{ member.created_at | date 'relative' }}
								</td>
								<td>
									<button @click="remove(member)" class="btn btn-danger btn-xs">Remove</button>
								</td>
							</tr>
						</table>
						<div v-if="!members.length" class="alert alert-info">No members registered!</div>
					</div>
					<nav aria-label="Page navigation">
						<ul class="pagination">
							<li v-if="paginator.prev_page_url">
								<a @click="previous()" href="javascript:;" aria-label="Previous">
									<span aria-hidden="true">Prev &laquo;</span>
								</a>
							</li>
							<li v-if="paginator.next_page_url">
								<a @click="next()" href="javascript:;" aria-label="Next">
									<span aria-hidden="true">&raquo; Next</span>
								</a>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</div>
	</div>
</template>

<script>

	import _ from 'underscore'
	import moment from 'moment'

	export default {

		ready() {
			this.getMembers();
		},

		data() {
			return {
				data: [],
				members: [],
				memberFilters: '',
				paginator: {}
			}
		},

		methods: {

			getMembers() {

				this.$http.get('members').then(response => {
					this.paginator = response.data;
					this.members = this.paginator.data;
					this.data = this.members;
				})

			},

			next() {
				this.$http.get(this.paginator.next_page_url).then(response => {
					this.paginator = response.data;
					this.members = this.paginator.data;
					this.data = this.members;
				})
			},

			previous() {
				this.$http.get(this.paginator.prev_page_url).then(response => {
					this.paginator = response.data;
					this.members = this.paginator.data;
					this.data = this.members;
				})
			},

			remove(member) {
				let self = this;
				swal({
					title: "Are you sure?",
					text: "You will not be able to recover this data!",
					type: "warning",
					showCancelButton: true,
					confirmButtonColor: "#DD6B55",
					confirmButtonText: "Yes, delete it!",
					cancelButtonText: "No, cancel plx!",
					closeOnConfirm: false,
					closeOnCancel: false,
					showLoaderOnConfirm: true,
				},
				function(isConfirm){
					if (isConfirm) {
						self.$http.delete('members/' + member.id).then(response => {
							self.members.$remove(member);
							swal("Deleted!", member.full_name + " has been deleted.", "success");
						})
					} else {
						swal("Cancelled", "Member not deleted :)", "error");
					}
				});
			}

		},

		computed: {

			students() {
				return _.where(this.members, {type: 'student'});
			},

			faculties() {
				return _.where(this.members, {type: 'faculty'});
			},

			filterMembersBy(filter) {
				this.members = _.filter(this.members, (member) => {
					var date = moment().subtract(1, filter);
					
					return moment(date).isAfter(member.created_at);
				});
			}

		},

		events: {
			'member:created'(member) {
				this.members.push(member);
			}
		}

	}
</script>