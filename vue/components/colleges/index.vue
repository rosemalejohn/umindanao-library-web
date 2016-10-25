<template>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption caption-md font-red-sunglo">
						<i class="icon-bar-chart theme-font hide"></i>
						<span class="caption-subject theme-font bold uppercase">Colleges</span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="table-scrollable table-scrollable-borderless">
						<table class="table table-hover table-light">
						<thead>
						<tr class="uppercase">
							<th>
								NAME
							</th>
							<th>
								DATE CREATED
							</th>
							<th>
								
							</th>
						</tr>
						</thead>
							<tr v-for="college in colleges">
								<td>
									{{ college.name }}
								</td>
								<td>
									{{ college.created_at | date 'relative' }}
								</td>
								<td>
									<button @click="remove(college)" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button>
								</td>
							</tr>
						</table>
						<div v-if="!colleges.length" class="alert alert-info">No members registered!</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import swal from 'sweetalert'

	export default {

		ready() {
			this.getColleges();
		},
		
		data() {
			return {
				colleges: []
			}
		},

		methods: {
			getColleges() {
				this.$http.get('colleges').then(response => {
					this.colleges = response.data;
				})
			},

			remove(college) {
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
					closeOnCancel: false
				},
				function(isConfirm){
					if (isConfirm) {
						self.$http.delete('colleges/' + college.id).then(response => {
							self.colleges.$remove(college);
							swal("Deleted!", "Your imaginary file has been deleted.", "success");
						})
					} else {
						swal("Cancelled", "College is not deleted :)", "error");
					}
				});
			}
		},

		events: {
			'college:created'(college) {
				this.colleges.push(college);
			}
		}

	}
</script>