
<template>
  <div class="col-md-12">
    <div class="loading" v-if="loading"></div>
  
    <div v-if="alerts.length" class="alert">
      <div
        v-for="alert in alerts"
        :class="alert.class"
        v-bind:key="alert.message"
      >{{ alert.message }}</div>
    </div>

    <div class="form-group col-md-3">
      <h4>استان ها</h4>
      <select v-model="province_id" @change="list_cities()" class="form-control" name="province_id" >
        <option :value="null" >
          همه استان ها
        </option>
        <option
          v-for="province in provinces"
          v-bind:value="province.id"
          v-bind:key="province.id"
          :selected="province.id==province_id"
        >{{province.name}}</option>
      </select>
    </div>
    <div class="form-group col-md-3">
      <h4>شهر ها</h4>
      <select v-model="city_id" class="form-control" name="city_id">
       <option :value="null" >
          همه شهر ها
        </option>
        <option
          v-for="city in cities"
          v-bind:value="city.id"
          v-bind:key="city.id"
          :selected="city.id==city_id"
        >{{city.name}}</option>
      </select>
    </div>

    <div class="form-group col-md-3" v-if="is_province_type">
      <h4>نوع استان</h4>
      <select class="form-control" name="province_type">
        <option value="0" :selected="province_type==0">استان موقع ثبت نام</option>
        <option value="1" :selected="province_type==1">آخرین استان انتخاب شده</option>
      </select>
    </div>
  </div>
</template>
    <script>
export default {
  data() {
    return {
      provinces: null,
      cities: null,
      province_id: null,
      city_id: null,
      loading: null,
      province_type: null,
      alerts: []
    };
  },
  props: {
    is_province_type: Boolean
  },
  created() {
    if (this.$route.query.province_id)
      this.province_id = this.$route.query.province_id;
    if (this.$route.query.city_id) this.city_id = this.$route.query.city_id;
    this.list_provinces();
  },
  methods: {
    list_provinces() {
          this.loading=true;
      this.$http.get("/location/provinces", {}).then(
        response => {
          this.provinces = response.body;
          this.list_cities();
        },
        response => {
          this.loading = false;
          this.alerts = [["message", response.toString()], ["class", "error"]];
        }
      );
    },
    list_cities() {
      this.loading = true;
      this.$http
        .get("/location/cities", {
          params: {
            province_id: this.province_id
          }
        })
        .then(
          response => {
            this.cities = response.body;

            this.loading = false;
          },
          response => {
            this.loading = false;
            this.alerts = [
              ["message", response.toString()],
              ["class", "error"]
            ];
          }
        );
    }
  }
};
</script>