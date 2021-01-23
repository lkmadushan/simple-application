<template>
  <tr>
    <td class="align-middle font-weight-bold pl-4">{{ employee.first_name }}</td>
    <td class="align-middle font-weight-bold pl-4">{{ employee.middle_name }}</td>
    <td class="align-middle font-weight-bold pl-4">{{ employee.last_name }}</td>
    <td class="align-middle font-weight-bold pl-4">{{ employee.department.name }}</td>
    <td class="align-middle font-weight-bold pl-4">{{ employee.city.name }}</td>
    <td class="align-middle font-weight-bold pl-4">{{ employee.city.state.name }}</td>
    <td class="align-middle font-weight-bold pl-4">{{ employee.city.state.country.name }}</td>
    <td class="align-middle font-weight-bold pl-4">{{ employee.address }}</td>
    <td class="align-middle font-weight-bold pl-4">{{ employee.zip }}</td>
    <td class="align-middle font-weight-bold pl-4">{{ employee.birthdate }}</td>
    <td class="align-middle font-weight-bold pl-4">{{ employee.date_hired }}</td>
    <td></td>
    <td>
      <div class="d-flex justify-content-end">
        <button @click="$emit('edit')" class="btn btn-link">
          <i class="fas fa-edit"></i>
        </button>
        <button @click="$emit('destroy')" class="btn btn-link text-danger">
          <i class="fas fa-trash"></i>
        </button>
      </div>
    </td>
  </tr>
</template>

<script>
export default {
  name: "EmployeesTableRow",

  props: {
    employee: {
      type: Object,
      required: true,
    },
  },
}
</script>

<style scoped>

</style>
