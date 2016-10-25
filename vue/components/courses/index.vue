<template>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption caption-md font-red-sunglo">
						<i class="icon-bar-chart theme-font hide"></i>
						<span class="caption-subject theme-font bold uppercase">Courses</span>
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
								COLLEGE
							</th>
							<th>
								DATE CREATED
							</th>
							<th>
								
							</th>
						</tr>
						</thead>
							<tr v-for="course in courses">
								<td>
									{{ course.name }}
								</td>
								<td>
									{{ course.college.name }}
								</td>
								<td>
									{{ course.created_at | date 'relative' }}
								</td>
								<td>
									<button @click="remove(course)" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button>
								</td>
							</tr>
						</table>
						<div v-if="!courses.length" class="alert alert-info">No course registered!</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		
		ready() {
			this.getCourses();
		},

		data() {
			return {
				courses: []
			}
		},

		methods: {
			getCourses() {
				this.$http.get('courses')
					.then(response => {
						this.courses = response.data;
					})
			},

			remove(course) {
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
	                    self.$http.delete('courses/' + course.id).then(response => {
	                        self.courses.$remove(course);
	                        swal("Deleted!", "Your course has been deleted.", "success");
	                    })
	                } else {
	                    swal("Cancelled", "Course is not deleted :)", "error");
	                }
	            });
	        }
		},

		events: {
			'course:created'(course) {
				this.courses.push(course);
			}
		}
	}
</script>