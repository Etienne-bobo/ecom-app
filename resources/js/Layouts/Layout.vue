<template>
  <div>
    <sidebar />
    <div class="relative md:ml-64 bg-gray-200">
      <admin-navbar />
    </div>
  </div>
</template>
<script>
import AdminNavbar from "./Navbar";
import Sidebar from "./Sidebar";
export default {
  name: "admin-layout",
  components: {
    AdminNavbar,
    Sidebar,
  },
};
</script>