<template>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption caption-md font-red-sunglo">
						<i class="icon-bar-chart theme-font hide"></i>
						<span class="caption-subject theme-font bold uppercase">Activities</span>
					</div>
					<div class="actions">
						<a v-if="data.length" href="/api/resources/{{ resource.id }}/export" class="btn btn-transparent grey-salsa btn-circle btn-sm">Export to excel</a>
						<div class="btn-group btn-group-devided" data-toggle="buttons">
							<button @click="data = resource.visitors" class="btn btn-transparent grey-salsa btn-circle btn-sm">
								All time
							</button>
							<button @click="filterBy('day')" class="btn btn-transparent grey-salsa btn-circle btn-sm">
								Today
							</button>
							<button @click="filterBy('week')" class="btn btn-transparent grey-salsa btn-circle btn-sm">
								Week
							</button>
							<button @click="filterBy('month')" class="btn btn-transparent grey-salsa btn-circle btn-sm">
								Month
							</button>
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
								Name
							</th>
							<th>
								Type
							</th>
							<th>
								Course
							</th>
							<th>
								College
							</th>
							<th>
								Date of visit
							</th>
							<th>
								Time of visit
							</th>
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
									{{ member.pivot.created_at | date '' 'MMMM DD, YYYY' }}
								</td>
								<td>
									{{ member.pivot.created_at | date '' 'h:m a' }}
								</td>
							</tr>
						</table>
						<div v-if="!data.length" class="alert alert-info">No one visited this resources!</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import _ from 'underscore'
	import moment from 'moment'

	export default {

		props: {
			resource: {
				type: Object,
				default() {
					return {}
				},
			}
		},

		ready() {
			this.data = this.resource.visitors;
		},

		data() {
			return {
				data: []
			}
		},

		methods: {

			filterBy(filter) {
				this.data = _.filter(this.resource.visitors, (visitor) => {
					return moment(visitor.pivot.created_at) >= moment().startOf(filter);
				});
			}

		},

		events: {
			'resource:visit'(resource) {
				if (this.resource.id == resource.id) {
					this.resource.visitors.push(resource);
				}
			}
		}

	}
</script>