<template>
  <div>
    <b-card-group deck>
      <b-card header-tag="header">
        <template #header>
          <h6 class="mb-0">Activites</h6>
        </template>
        <b-card-text>
          <!-- <b-table id="datatable" striped hover :items="items"></b-table> -->
          <table class="activitiesTable" id="datatable">
            <thead>
              <tr>
                <th>Who</th>
                <th>From</th>
                <th>Id</th>
                <th>Message</th>
                <th>Watch Id</th>
                <th>Received</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in items" :key="item.Id">
                <td>{{ item.Who }}</td>
                <td>{{ item.From }}</td>
                <td>{{ item.Id }}</td>
                <td>{{ item.Message }}</td>
                <td>{{ item.WatchId }}</td>
                <td>{{ item.Received }}</td>
              </tr>
            </tbody>
          </table>
        </b-card-text>
      </b-card>
    </b-card-group>
  </div>
</template>

<script scoped>
import $ from "jquery";

export default {
  name: "ActivitiesComponent",
  data() {
    return {
      items: [],
    };
  },
  mounted() {
    axios.get("/getactivities").then((response) => {
      this.items = response.data;
    });
  },
  updated() {
    $("#datatable").DataTable({
      processing: true,
      dom: "Bfrtip",
      buttons: ["copy", "csv", "print", "excel", "pdf"],
    });
  },
};
</script>