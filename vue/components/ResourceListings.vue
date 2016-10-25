<template>
	<div class="row">
		<div class="col-md-12">
			<div class="portlet light">
				<div class="portlet-title">
					<div class="caption caption-md font-red-sunglo">
						<i class="icon-bar-chart theme-font hide"></i>
						<span class="caption-subject theme-font bold uppercase">Resources</span>
					</div>
				</div>
				<div class="portlet-body">
					<div class="table-scrollable table-scrollable-borderless">
						<table class="table table-hover table-light">
						<thead>
						<tr class="uppercase">
							<th>
								
							</th>
							<th>
								NAME
							</th>
							<th>
								DETAILS
							</th>
							<th>
								URL
							</th>
							<th>
								DATE ADDED
							</th>
							<th>
								
							</th>
						</tr>
						</thead>
							<tr v-for="resource in resources">
								<td width="15%">
									<img width="100%" :src="resource.photo || '/img/resources.png'" />
								</td>
								<td width="15%">
									<a href="/resource-listings/{{ resource.id }}">{{ resource.name }}</a>
								</td>
								<td width="35%">
									{{ resource.details }}
								</td>
								<td width="5%">
									<a target="_blank" href="{{ resource.url }}">{{ resource.url }}</a>
								</td>
								<td>
									{{ resource.created_at | date 'relative' }}
								</td>
								<td width="15%">
									<button @click="remove(resource)" class="btn btn-danger btn-sm"><i class="fa fa-remove"></i></button>
									<button @click="edit(resource)" class="btn btn-success btn-sm"><i class="fa fa-edit"></i></button>
								</td>
							</tr>
						</table>
						<div v-if="!resources.length" class="alert alert-info">No resources available!</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<edit-resource-form-modal title="Update resources" target="updateResourceModal" method="PUT">
		<resource-form slot="content" :form.sync="resource"></resource-form>
		<div slot="modal-footer" class="modal-footer">
            <button @click="updateResources()" class="btn btn-default">Save</button>
        </div>
	</edit-resource-form-modal>
</template>

<script>
	import EditResourceFormModal from './../components/Modal.vue'
	import ResourceForm from './../forms/Resources.vue'

	export default {

		components: {
			EditResourceFormModal, ResourceForm
		},
		
		ready() {
			this.getResources();
		},

		data() {
			return {
				resources: [],
				resource: {}
			}
		},

		methods: {
			getResources() {
				this.$http.get('resources').then(response => {
					this.resources = response.data;
				}).catch(err => {
					toastr.error('Cannot fetch resources.');
				})
			},

			remove(resource) {
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
						self.$http.delete('resources/' + resource.id).then(response => {
							self.resources.$remove(resource);
							swal("Deleted!", "Your imaginary file has been deleted.", "success");
						})
					} else {
						swal("Cancelled", "Resource is not deleted :)", "error");
					}
				});
			},

			edit(resource) {
				this.resource = resource;
				$('#updateResourceModal').modal('show');
			},

			updateResources() {
				this.$http.put('resources/' + this.resource.id, this.resource).then(response => {
					toastr.success('Resources updated!');
				});
			}

		},

		events: {
			'resource:created'(resource) {
				this.resources.push(resource);
			}
		}

	}
</script>