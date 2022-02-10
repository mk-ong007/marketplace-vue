<template>
  <div>
    <b-card-group deck>
      <b-card header-tag="header">
        <template #header>
          <h6 class="mb-0">Watch History</h6>
        </template>
        <b-card-text>
          <!-- <b-table id="datatable" striped hover :items="items"></b-table> -->
          <table class="watchHistoryTable" id="datatable">
            <thead>
              <tr>
                <th>Id</th>
                <th>Brand</th>
                <th>Collection</th>
                <th>Model</th>
                <th>Serial</th>
                <th>Added by</th>
                <th>Asking/Estimate</th>
                <th>Added on</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in items" :key="item.Id">
                <td>{{ item.id }}</td>
                <td>{{ item.brand }}</td>
                <td>{{ item.collection }}</td>
                <td>{{ item.model }}</td>
                <td>{{ item.serial }}</td>
                <td>{{ item.addedBy }}</td>
                <td>{{ item.askingEstimate }}</td>
                <td>{{ item.addedOn }}</td>
                <td>{{ item.status }}</td>
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
  name: "WatchHistoryComponent",
  data() {
    return {
      items: [],
    };
  },
  mounted() {
    axios.get("/watch-history").then((response) => {
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