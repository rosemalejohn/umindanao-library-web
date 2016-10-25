<template>
    <form role="form">
        <div class="form-body">
            <div class="form-group">
                <label>College name</label>
                <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                    </span>
                    <input v-model="form.name" type="text" class="form-control" placeholder="College name">
                </div>
            </div>
        </div>
    </form>
</template>

<script>

export default {
    
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
            this.$http.post('colleges', this.form).then(response => {
                this.form = {};
                toastr.success('College: ' + response.data.name + ' added.');
                this.$dispatch('college:created', response.data);
            });
        }
    },

    events: {
        'form:submit'(form) {
            if (form == 'college') {
                this.submit();
            }
        }
    }

}
</script>