<script>

	import CoursesListings from './components/courses/index.vue'
	import CollegesListings from './components/colleges/index.vue'
	import ResourceListings from './components/ResourceListings.vue'
	import ShowResource from './components/ShowResource.vue'

	import Dashboard from './components/Dashboard.vue'

	import CourseFormModal from './components/Modal.vue'
	import CollegeFormModal from './components/Modal.vue'
	import ResourceFormModal from './components/Modal.vue'

	import CourseForm from './forms/Course.vue'
	import CollegeForm from './forms/College.vue'
	import ResourceForm from './forms/Resources.vue'

	import Vue from 'vue'
	import moment from 'moment'

	export default {

		components: {
			CoursesListings, 
			CollegesListings,
			ResourceListings,
			ShowResource,
			Dashboard,

			CourseFormModal,
			CollegeFormModal,
			ResourceFormModal,

			CourseForm,
			CollegeForm,
			ResourceForm
		},

		ready() {
			var memberChannel = pusher.subscribe('member');
			var resourceChannel = pusher.subscribe('resource');

			memberChannel.bind('App\\Events\\NewMemberRegistered', message => {
				toastr.success('New member registered: ' + message.member.full_name);
				this.$emit('member:created', message.member);
			})

			resourceChannel.bind('App\\Events\\NewResourceVisit', message => {
				var resource = member.resource;
				toastr.success('New user visited the ' + resource.name);
				this.$emit('resource:visit', resource);
			});
		},

		methods: {
			submitForm(form) {
				this.$broadcast('form:submit', form);
			}
		},

		events: {
			'college:created'(college) {
				this.$broadcast('college:created', college);
			},

			'resource:created'(resource) {
				this.$broadcast('resource:created', resource);
			},

			'resource:visit'(resource) {
				this.$broadcast('resource:visit', resource);
			},

			'course:created'(course) {
				this.$broadcast('course:created', course);
			},

			'member:created'(member) {
				this.$broadcast('member:created', member);
			}

		}

	}

	Vue.filter('date', function(value, type = null, format = null) {

	    if (type == 'relative') {
	        return moment(value).fromNow();
	    } else if (type == 'unix') {
	    	return moment.unix(value).fromNow();
	    }

	    return moment(value).format(format || "MM/DD/YYYY");

	});

</script>