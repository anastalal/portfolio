<script setup>
import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

// الحصول على البيانات من props
const about = usePage().props.aboutMe ?? []

// جهات الاتصال وروابط التواصل الاجتماعي
const contacts = [
  {
    icon: 'mail-outline',
    title: 'Email',
    link: `mailto:${about.email}`,
    text: about.email,
  },
  {
    icon: 'phone-portrait-outline',
    title: 'Phone',
    link: `tel:${about.phone}`,
    text: about.phone,
  },
  {
    icon: 'calendar-outline',
    title: 'Birthday',
    link: '',
    text: about.dob,
  },
  {
    icon: 'location-outline',
    title: 'Location',
    link: '',
    text: about.location,
  },
]

const socialLinks = [
  {
    icon: 'logo-github',
    link: about.links?.github || '#',
  },
  {
    icon: 'logo-twitter',
    link: about.links?.twitter || '#',
  },
  {
    icon: 'logo-linkedin',
    link: about.links?.linkedin || '#',
  },
]

// دالة تبديل حالة القائمة الجانبية
const isSidebarActive = ref(true);
const toggleSidebar = () => {
  isSidebarActive.value = !isSidebarActive.value;
};
</script>

<template>
    <aside class="sidebar" :class="{ active: isSidebarActive }">
        <div class="sidebar-info">
            <figure class="avatar-box">
                <img
                    src="assets/images/my-avatar.png"
                    alt="Anas Talal"
                    width="80"
                />
            </figure>

            <div class="info-content">
                <h1 class="name" title="Anas Talal">{{about.name}}</h1>
                <p class="title">{{about.job_title}}</p>
            </div>

            <button class="info_more-btn" @click="toggleSidebar">
                <span>{{ isSidebarActive ? 'Hide Contacts' : 'Show Contacts' }}</span>
                <ion-icon :name="isSidebarActive ? 'chevron-up' : 'chevron-down'"></ion-icon>
            </button>
        </div>

        <div v-if="isSidebarActive" class="sidebar-info_more">
            <div class="separator"></div>

            <ul class="contacts-list">
                <li
                    class="contact-item"
                    v-for="(contact, index) in contacts"
                    :key="index"
                >
                    <div class="icon-box">
                        <ion-icon :name="contact.icon"></ion-icon>
                    </div>

                    <div class="contact-info">
                        <p class="contact-title">{{ contact.title }}</p>
                        <a :href="contact.link" class="contact-link">{{ contact.text }}</a>
                    </div>
                </li>
            </ul>

            <div class="separator"></div>

            <ul class="social-list">
                <li
                    class="social-item"
                    v-for="(social, index) in socialLinks"
                    :key="index"
                >
                    <a :href="social.link" class="social-link">
                        <ion-icon :name="social.icon"></ion-icon>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
</template>

<style scoped>
.sidebar {
    /* Your CSS styles here */
}
.sidebar.active {
    /* Styles when the sidebar is active */
}
</style>
