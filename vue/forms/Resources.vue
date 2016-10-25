<template>
	<form role="form">
        <div class="form-body">
            <div class="form-group">
                <label>Name</label>
                <div class="input-group">
                    <span class="input-group-addon input-circle-left">
                    <i class="fa fa-info"></i>
                    </span>
                    <input v-model="form.name" type="text" class="form-control input-circle-right" placeholder="Resources name">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <label>Photo</label>
                    <photo-upload :photo.sync="form.photo"></photo-upload>
                </div>
            </div>

            <div class="form-group">
                <label>Details</label>
                <textarea v-model="form.details" class="form-control" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label>Website URL</label>
                <div class="input-group input-icon right">
                    <span class="input-group-addon">
                    <i class="fa fa-link"></i>
                    </span>
                    <i class="fa fa-exclamation tooltips" data-original-title="Invalid email." data-container="body"></i>
                    <input v-model="form.url" class="input-error form-control" type="url" value="">
                </div>
            </div>
        </div>
    </form>
</template>

<script>

import PhotoUpload from './../components/PhotoUpload.vue'

export default {

    components: {
        PhotoUpload
    },
    
    props: {
        method: {
            type: String,
            default: 'POST',
            required: false
        },

        form: {
            type: Object,
            twoWay: true,
            default() {
                return {}
            },
            required: false
        }
    },

    methods: {

    	submit() {
    		this.$http.post('resources', this.form).then(response => {
                toastr.success('Resources added!');
                this.form = {};
                this.$dispatch('resource:created', response.data);
            }).catch(err => {
                toastr.error('Resources not added!');
            })
    	}

    },

    events: {
        'form:submit'(val) {
            if (val == 'resources' && this.method == 'POST') {
                this.submit();
            }
        }
    }

}
</script>