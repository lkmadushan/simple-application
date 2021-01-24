<template>
  <table class="table mt-3">
    <thead>
    <tr>
      <th scope="col" class="pl-4">First Name</th>
      <th scope="col" class="pl-4">Middle Name</th>
      <th scope="col" class="pl-4">Last Name</th>
      <th scope="col" class="pl-4">Department</th>
      <th scope="col" class="pl-4">Country</th>
      <th scope="col" class="pl-4">State</th>
      <th scope="col" class="pl-4">City</th>
      <th scope="col" class="pl-4">Address</th>
      <th scope="col" class="pl-4">Zip</th>
      <th scope="col" class="pl-4">Birthdate</th>
      <th scope="col" class="pl-4">Date Hired</th>
      <th scope="col"></th>
      <th class="text-right pr-4" scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
      <employees-table-row
        v-for="employee in employees"
        :employee="employee"
        :key="employee.id"
        @edit="$emit('edit', employee)"
        @destroy="$emit('destroy', employee)"
      />
    <tr v-if="!employees.length">
      <td colspan="13" class="text-center">No employees available.</td>
    </tr>
    </tbody>
  </table>
</template>

<script>
import EmployeesTableRow from "./EmployeesTableRow";
export default {
  name: "EmployeesTable",
  components: {EmployeesTableRow},
  props: {
    employees: {
      type: Array,
      required: true,
    },
  },
}
</script>
