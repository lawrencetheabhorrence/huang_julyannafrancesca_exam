<template>
  <main class="q-pa-lg">
    <header class="row justify-between items-center shadow-2 rounded-borders full-width q-pa-md">
      <h1 class="text-weight-medium">Products Management</h1>
      <q-btn text-color="white" class="text-body1 q-pa-lg" style="background: #65558f; border-radius: 9999px;">Add Product</q-btn>
    </header>
    <section class="column items-stretch q-gutter-lg q-mt-md">
      <section class="row items-center rounded-borders" style="background: #8b3f93;">
        <h2 class="col header text-center text-weight-medium">Product Name</h2>
        <h2 class="col header text-center text-weight-medium">Price</h2>
        <h2 class="col header text-center text-weight-medium">Number of Stocks</h2>
        <h2 class="col header text-center text-weight-medium">Action</h2>
      </section>
      <section class="row items-center rounded-borders" style="background: white;">
        <h2 class="col text-center text-weight-medium">Test Product</h2>
        <h2 class="col text-center text-weight-medium">P100.00</h2>
        <h2 class="col text-center text-weight-medium">100</h2>
        <q-btn-group flat class="col flex-center">
          <q-btn text-color="black" icon="edit" />
          <q-btn text-color="black" icon="delete" />
        </q-btn-group>
      </section>

    </section>
  </main>
</template>

<style scoped>
main {
  background: rgba(139, 63, 147, 0.14);
  width: 100%;
  height: 100%;
  min-height: 100vh;
  margin: 0;
}

p {
  margin: 0;
}

header {
  background: white;
}

h1 {
  font-size: 2em;
  margin: 0;
  padding: 0;
  color: #8B3F93;
}

h2 {
  font-size: 1.3em;
  line-height: 1.5em;
  margin: 0;
  padding: 0;
}

h2.header {
  color: white;
}
</style>
