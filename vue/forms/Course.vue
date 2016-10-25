<template>
    <form role="form">
        <div class="form-body">
            <div class="form-group">
                <label>Course name</label>
                <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                    </span>
                    <input v-model="form.name" type="text" class="form-control" placeholder="Course name">
                </div>
            </div>
            <div class="form-group">
                <label>Course code</label>
                <div class="input-group">
                    <span class="input-group-addon">
                    <i class="fa fa-info"></i>
                    </span>
                    <input v-model="form.code" type="text" class="form-control" placeholder="Course code">
                </div>
            </div>
            <div class="form-group">
                <label>Colleges</label>
                <select class="form-control" v-model="form.college_id">
                    <option {{ $index == 1 ? 'selected' : '' }} v-for="college in colleges" :value="college.id">{{ college.name }}</option>
                </select>
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
            }
        }
    },

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

        submit() {
            this.$http.post('courses', this.form).then(response => {
                this.colleges = response.data;
                this.$dispatch('course:created', response.data);
                this.form.code = '';
                this.form.name = '';
            })
        }
    },

    events: {
        'form:submit'(val) {
            if (val == 'course') {
                this.submit();
            }
        }
    }

}
</script>