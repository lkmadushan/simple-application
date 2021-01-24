<template>
  <div>
    <div class="card">
      <div class="card-header">Employees</div>
      <div class="card-body">
        <div class="d-flex">
          <input v-model="searchString" placeholder="Search here..." type="text" class="form-control" name="search">
          <button @click="searchEmployees" class="mx-2 btn btn-primary text-light">
            <i class="fa fa-search"></i>
          </button>
          <button class="btn btn-primary" @click="create">Create</button>
        </div>
        <div style="overflow-x: auto">
          <employees-table
            :employees="employees"
            @edit="edit"
            @destroy="destroy"
          />
        </div>
      </div>
    </div>
    <modal
      name="employee-form"
      adaptive
      scrollable
      :max-width="800"
      width="95%"
      height="auto"
    >
      <div class="card">
        <div class="card-header">New Employee</div>
        <div class="card-body">
          <validation-observer ref="wellForm" v-slot="{ invalid }" tag="div">
            <div style="height: 600px; overflow-y: auto" >
              <validation-provider rules="required|alpha|max:6" v-slot="{ errors }">
                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input
                    id="first_name"
                    name="first_name"
                    type="text"
                    class="form-control"
                    v-model="selectedEmployee.first_name"
                  >
                  <span class="text-danger">{{ errors[0] }}</span>
                </div>
              </validation-provider>

              <validation-provider rules="alpha|max:60" v-slot="{ errors }">
                <div class="form-group">
                  <label for="middle_name">Middle Name</label>
                  <input
                    id="middle_name"
                    name="middle_name"
                    type="text"
                    class="form-control"
                    v-model="selectedEmployee.middle_name"
                  >
                  <span class="text-danger">{{ errors[0] }}</span>
                </div>
              </validation-provider>

              <validation-provider rules="required|alpha|max:60" v-slot="{ errors }">
                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input
                    id="last_name"
                    name="last_name"
                    type="text"
                    class="form-control"
                    v-model="selectedEmployee.last_name"
                  >
                  <span class="text-danger">{{ errors[0] }}</span>
                </div>
              </validation-provider>

              <validation-provider rules="required" v-slot="{ errors }">
                <div class="form-group">
                  <label for="country_id">Country</label>
                  <select
                    v-model="selectedEmployee.country_id"
                    class="form-control custom-select"
                    id="country_id"
                    name="country_id"
                  >
                    <option
                      v-for="country in countries"
                      :value="country.id"
                    >
                      {{ country.name }}
                    </option>
                  </select>
                  <span class="text-danger">{{ errors[0] }}</span>
                </div>
              </validation-provider>

              <validation-provider rules="required" v-slot="{ errors }">
                <div class="form-group">
                  <label for="state_id">State</label>
                  <select
                    v-model="selectedEmployee.state_id"
                    class="form-control custom-select"
                    id="state_id"
                    name="state_id"
                  >
                    <option
                      v-for="state in states"
                      :value="state.id"
                    >
                      {{ state.name }}
                    </option>
                  </select>
                  <span class="text-danger">{{ errors[0] }}</span>
                </div>
              </validation-provider>

              <validation-provider rules="required" v-slot="{ errors }">
                <div class="form-group">
                  <label for="city_id">City</label>
                  <select
                    v-model="selectedEmployee.city_id"
                    class="form-control custom-select"
                    id="city_id"
                    name="city_id"
                  >
                    <option
                      v-for="city in cities"
                      :value="city.id"
                    >
                      {{ city.name }}
                    </option>
                  </select>
                  <span class="text-danger">{{ errors[0] }}</span>
                </div>
              </validation-provider>

              <validation-provider rules="required|alpha_spaces|max:120" v-slot="{ errors }">
                <div class="form-group">
                  <label for="address">Address</label>
                  <input
                    id="address"
                    name="address"
                    type="text"
                    class="form-control"
                    v-model="selectedEmployee.address"
                  >
                  <span class="text-danger">{{ errors[0] }}</span>
                </div>
              </validation-provider>

              <validation-provider rules="required|max:10" v-slot="{ errors }">
                <div class="form-group">
                  <label for="zip">Zip</label>
                  <input
                    id="zip"
                    name="zip"
                    type="text"
                    class="form-control"
                    v-model="selectedEmployee.zip"
                  >
                  <span class="text-danger">{{ errors[0] }}</span>
                </div>
              </validation-provider>

              <validation-provider rules="required" v-slot="{ errors }">
                <div class="form-group">
                  <label for="department_id">Department</label>
                  <select
                    v-model="selectedEmployee.department_id"
                    class="form-control custom-select"
                    id="department_id"
                    name="city_id"
                  >
                    <option
                      v-for="department in departments"
                      :value="department.id"
                    >
                      {{ department.name }}
                    </option>
                  </select>
                  <span class="text-danger">{{ errors[0] }}</span>
                </div>
              </validation-provider>

              <div class="form-group">
                <label for="birthdate">Bithdate</label>
                <input id="birthdate" v-model="selectedEmployee.birthdate" type="date" class="form-control"/>
              </div>

              <div class="form-group">
                <label for="date_hired">Bithdate</label>
                <input id="date_hired" v-model="selectedEmployee.date_hired" type="date" class="form-control"/>
              </div>

              <button :disabled="invalid" @click="save" class="btn btn-primary">Save</button>
            </div>
          </validation-observer>
        </div>
      </div>
    </modal>
  </div>
</template>

<script>

import {ValidationProvider, ValidationObserver, extend} from 'vee-validate';
import {required, alpha, alpha_spaces, max} from 'vee-validate/dist/rules';

extend('required', {
  ...required,
  message: 'This field is required'
});

extend('alpha', {
  ...alpha,
  message: 'This field should only contains alphabetical characters'
});

extend('alpha_spaces', {
  ...alpha_spaces,
  message: 'This field should only contains alphabetical characters and spaces'
});

extend('max', {
  ...max,
  params: ['length'],
  message: 'This filed should not contains more than {length} characters'
});

export default {
  name: "Employees",

  components: {ValidationProvider, ValidationObserver},

  data() {
    return {
      employees: [],
      countries: [],
      states: [],
      cities: [],
      departments: [],
      selectedEmployee: {},
      searchString: '',
    }
  },

  created() {
    this.fetchEmployees()
    this.fetchCountries()
    this.fetchDepartment()
  },

  watch: {
    'selectedEmployee.country_id': {
      immediate: true,
      handler() {
        this.fetchStates()
      }
    },

    'selectedEmployee.state_id': {
      immediate: true,
      handler() {
        this.fetchCities()
      },
    }
  },

  methods: {
    async searchEmployees() {
      const {data} = await this.$http.get('employees', {
        params: {
          search: this.searchString,
        }
      })

      this.employees = data
    },

    async fetchEmployees() {
      const {data} = await this.$http.get('employees')

      this.employees = data
    },

    async fetchCountries() {
      const {data} = await this.$http.get('countries')

      this.countries = data
    },

    async fetchDepartment() {
      const {data} = await this.$http.get('departments')

      this.departments = data
    },

    async fetchStates() {
      const {data} = await this.$http.get('states', {
        params: {
          country_id: this.selectedEmployee.country_id,
        }
      })

      this.states = data
    },

    async fetchCities() {
      const {data} = await this.$http.get('cities', {
        params: {
          state_id: this.selectedEmployee.state_id,
        }
      })

      this.cities = data
    },

    create() {
      this.resetForm()

      this.$modal.show('employee-form')
    },

    edit(employee) {
      this.selectedEmployee = {
        ...employee,
      }

      this.$modal.show('employee-form')
    },

    async save() {
      const url = !this.selectedEmployee.id
        ? 'employees'
        : `employees/${this.selectedEmployee.id}`

      const method = !this.selectedEmployee.id
        ? 'post'
        : 'put'

      try {
        await this.$http[method](url, {
          ...this.selectedEmployee,
        })

        this.$modal.hide('employee-form')
        this.resetForm()
        this.fetchEmployees()
      } catch ({response}) {
      }
    },

    async destroy(employee) {
      await this.$http.delete(`employees/${employee.id}`)

      this.fetchEmployees()
    },

    resetForm() {
      this.selectedEmployee = {}
    },
  },
}
</script>
