<template>
  <q-layout view="hHh lpR fFf">

    <q-drawer class="column items-stretch justify-between q-py-lg" show-if-above v-model="leftDrawerOpen" side="left" style="width: 100%;" elevated>
      <section class="column items-center">
        <img src="/logo.png" style="width: 90%; padding: 10px 30px; border-bottom: 1px solid grey;">
        <q-list class="column items-center q-pt-md" style="width: 100%;">
          <q-item class="item" style="width: 100%;" clickable v-ripple>
            <q-item-section avatar>
              <q-icon color="black" name="inbox" />
            </q-item-section>
            <q-item-section>Products Management</q-item-section>
          </q-item>
          <q-item class="item" style="width: 100%;" clickable v-ripple>
            <q-item-section avatar>
              <q-icon color="black" name="inbox" />
            </q-item-section>
            <q-item-section>Orders</q-item-section>
          </q-item>
          <q-item class="item" style="width: 100%;" clickable v-ripple>
            <q-item-section avatar>
              <q-icon color="black" name="group" />
            </q-item-section>
            <q-item-section>Users Management</q-item-section>
          </q-item>
        </q-list>
      </section>
      <section class="row items-center justify-between q-px-md" style="width: 100%;">
        <section class="row items-center">
          <q-avatar size="48px" font-size="32px" text-color="purple" icon="person" style="background: #eaddff;"/>
          <p class="q-pl-md text-body2" style="margin: 0;">Hi, <span class="text-weight-medium text-body1">Admin!</span></p>
        </section>
        <q-btn flat rounded color="red" icon="logout" style="justify-self: end;" />
      </section>
    </q-drawer>

    <q-page-container>
    </q-page-container>

  </q-layout>
</template>
