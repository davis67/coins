<template>
  <div>
    <details v-for="partone in partonedata" :key="partone.id" class="border px-2 py-2 m-3">
      <summary class="px-4">
        <div class="flex text-sm text-gray-600">
          <div>
            <span class="text-lg text-gray-800">
              Performance
              Dimension
            </span>
            <p>{{partone.performance_dimension}}</p>
          </div>
          <div>
            <span class="text-lg text-gray-800">Weight</span>
            <p>{{partone.weight}}%</p>
          </div>
        </div>
      </summary>
      <table class="table-auto">
        <thead>
          <th class="text-sm">Description</th>
          <th class="text-sm">Measurement</th>
          <th class="text-sm">Target Performance</th>
          <th class="text-sm">Self Assessment</th>
          <th class="text-sm">Supervisor Assessment</th>
        </thead>

        <tbody>
          <tr v-for="dimension in partone.performance_dimensions" :key="dimension.id">
            <td class="text-sm">{{dimension.description}}</td>
            <td class="text-sm">{{dimension.measurement}}</td>
            <td class="text-center">{{dimension.target_performance}}</td>
            <td class="text-center" colspan="2">
              <form>
                <input
                  type="number"
                  class="w-12 text-center border"
                  name="self_assessment"
                  v-model="self_assessment"
                  autofocus
                />

                <input
                  type="number"
                  class="w-12 text-center border"
                  name="supervisor_assessment"
                  v-model="supervisor_assessment"
                />
                <button
                  type="submit"
                  @click.prevent="addPartonedata"
                  class="bg-red-800 hover:bg-red-600 text-xs px-1 py-1 text-white"
                >Add</button>
              </form>
            </td>
          </tr>
        </tbody>
      </table>
    </details>
  </div>
</template>
<script>
export default {
  props: ["partonedata", "user"],
  created() {
    console.log(this.partonedata, this.user);
  },
  data() {
    return {
      self_assessment: "",
      supervisor_assessment: "",
      user_id: this.user.id
    };
  },
  methods: {
    addPartonedata() {
      console.log(
        this.self_assessment,
        this.supervisor_assessment,
        this.user_id
      );
    }
  }
};
</script>
