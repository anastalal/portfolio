<script setup>
import Fancybox from "@/Components/Fancybox.vue";
import Layout from "@/Layouts/Layout.vue";
import { Head } from "@inertiajs/vue3";
import dayjs from 'dayjs'
defineProps({
  aboutMe: {
    type: Object,
  },
  services: {
    type: Array,
  },
  educationExperiences: {
    type: Array,
  },
  workExperiences: {
    type: Array,
  },
  employmentHistories: {
    type: Array,
  },
  skills: {
    type: Array,
  },
  projects: {
    type: Array,
  },
});
</script>
<script>
export default {
  data() {
    return {
      selectedCategory: 'all',
      activePage: "about", // الصفحة الافتراضية
      navbarLinks: [
        { name: "About", page: "about" },
        { name: "Resume", page: "resume" },
        { name: "Portfolio", page: "portfolio" },
        { name: "Blog", page: "blog" },
        { name: "Contact", page: "contact" },
      ],
      pages: [
        {
          page: "about",
          content: "I am a web developer with experience in creating dynamic websites.",
        },
        {
          page: "resume",
          content: "Here is my resume including my skills and experience.",
        },
        {
          page: "portfolio",
          content: "These are some of the projects I have worked on.",
        },
        {
          page: "blog",
          content: "Welcome to my blog where I share insights on web development.",
        },
        {
          page: "contact",
          content: "Feel free to reach out to me via email or phone.",
        },
      ],
    };
  },
  computed: {
    filteredProjects() {
      if (this.selectedCategory === 'all') {
        return this.projects;
      }
      return this.projects.filter(
        (project) => project.category === this.selectedCategory
      );
    },
  },
  methods: {
    setActivePage(page) {
      this.activePage = page;
      window.scrollTo(0, 0); // تمرير الصفحة إلى الأعلى
    },
    formatDate(date) {
      return dayjs(date).format('MMM YYYY'); // لطباعة الشهر المختصر والسنة فقط
    }
  },
};
</script>
<template>
  <Head title="Anas Talal - Full Stack Developer" />
  <Layout>
    <div>
      <nav className="navbar">
        <ul className="navbar-list">
          <li v-for="(link, index) in navbarLinks" :key="index" className="navbar-item">
            <button
              :class="['navbar-link', { active: activePage === link.page }]"
              @click="setActivePage(link.page)"
            >
              {{ link.name }}
            </button>
          </li>
        </ul>
      </nav>

      <!-- <article
        v-for="(page, index) in pages"
        :key="index"
        class="active"
        :class="[page.page]"
        :data-page="page.page"
      > -->
      <article class="about" data-page="about"  v-if="activePage === 'about'">
        <div >
          <header>
            <h2 class="h2 article-title">About me</h2>
          </header>

          <section class="about-text">
            <div v-if="aboutMe" v-html="aboutMe.description"></div>
          </section>

          <!-- services section -->
          <section class="service">
            <h3 class="h3 service-title">What I'm doing</h3>

            <ul class="service-list">
              <li v-for="service in services" :key="service.id" class="service-item">
                <div class="service-icon-box">
                  <img
                    :src="service.img_path"
                    :alt="service.title + ' icon'"
                    width="40"
                  />
                </div>

                <div class="service-content-box">
                  <h4 class="h4 service-item-title">
                    {{ service.title }}
                  </h4>
                  <p class="service-item-text">
                    {{ service.description }}
                  </p>
                </div>
              </li>
            </ul>
          </section>
        </div>
      </article>
     
      <article class="resume"  v-if="activePage === 'resume'">
        <div >
          <header>
            <h2 class="h2 article-title">Resume</h2>
          </header>

          <!-- Education Section -->
          <section class="timeline">
            <div class="title-wrapper">
              <div class="icon-box">
                <ion-icon name="book-outline"></ion-icon>
              </div>
              <h3 class="h3">Education</h3>
            </div>
            <ol class="timeline-list">
              <li
                v-for="education in educationExperiences"
                :key="education.id"
                class="timeline-item"
              >
                <h4 class="h4 timeline-item-title">
                  {{ education.job_title }}
                </h4>
                <span>
                  {{ education.company_name }}
                </span>
                <span>
                  {{ formatDate(education.start_date) }} —
                  {{ education.end_date ? formatDate(education.end_date) : "Present" }}
                </span>
                <p class="timeline-text">
                  {{ education.description }}
                </p>
              </li>
            </ol>
          </section>

          <!-- Work Experience Section -->
          <section class="timeline">
            <div class="title-wrapper">
              <div class="icon-box">
                <ion-icon name="book-outline"></ion-icon>
              </div>
              <h3 class="h3">Work Experience</h3>
            </div>
            <ol class="timeline-list">
              <li v-for="work in workExperiences" :key="work.id" class="timeline-item">
                <h4 class="h4 timeline-item-title">
                  {{ work.job_title }}
                </h4>
                <span>
                  {{ formatDate(work.start_date) }} —
                  {{ work.end_date ? formatDate(work.end_date) : "Present" }}
                </span>
                <p class="timeline-text">
                  {{ work.description }}
                </p>
              </li>
            </ol>
          </section>

          <!-- Employment History Section -->
          <section class="timeline">
            <div class="title-wrapper">
              <div class="icon-box">
                <ion-icon name="book-outline"></ion-icon>
              </div>
              <h3 class="h3">Employment History</h3>
            </div>
            <ol class="timeline-list">
              <li
                v-for="employment in employmentHistories"
                :key="employment.id"
                class="timeline-item"
              >
                <h4 class="h4 timeline-item-title">
                  {{ employment.job_title }}
                </h4>
                <span>
                  {{ formatDate(employment.start_date) }} —
                  {{ employment.end_date ? formatDate(employment.end_date) : "Present" }}
                </span>
                <p class="timeline-text">
                  {{ employment.description }}
                </p>
              </li>
            </ol>
          </section>

          <!-- Skills Section -->
          <section class="skill">
            <h3 class="h3 skills-title">My skills</h3>
            <ul class="skills-list content-card">
              <li v-for="skill in skills" :key="skill.id" class="skills-item">
                <div class="title-wrapper">
                  <h5 class="h5">{{ skill.skill_name }}</h5>
                  <data :value="skill.percentage">{{ skill.percentage }}%</data>
                </div>
                <div class="skill-progress-bg">
                  <div
                    class="skill-progress-fill"
                    :style="{
                      width: skill.percentage + '%',
                    }"
                  ></div>
                </div>
              </li>
            </ul>
          </section>
        </div>
      </article>

      
      <article class="portfolio" v-if="activePage === 'portfolio'">
        <div>
          <header>
            <h2 class="h2 article-title">Portfolio
              <small class="text-xs block text-gray-200 font-normal " style="text-transform: none;">
                I have developed and published numerous web applications and websites, managing each project from start to finish as a full stack developer. Some of these projects were completed for companies I have worked with, and the copyrights belong to those companies.


            </small>
            </h2>
           
          </header>
      
          <section class="projects">
            <ul class="filter-list">
              <li class="filter-item">
                <button :class="{ 'active': selectedCategory === 'all' }" @click="selectedCategory = 'all'">All</button>
              </li>
              <li class="filter-item">
                <button :class="{ 'active': selectedCategory === 'Websites' }" @click="selectedCategory = 'Websites'">Websites</button>
              </li>
              <li class="filter-item">
                <button :class="{ 'active': selectedCategory === 'Web Applications' }" @click="selectedCategory = 'Web Applications'">Web Applications</button>
              </li>
              <li class="filter-item">
                <button :class="{ 'active': selectedCategory === 'Back-end' }" @click="selectedCategory = 'Back-end'">Back-end</button>
              </li>
            </ul>
      
            <!-- select category for mobile screen -->
            <select v-model="selectedCategory" name="" id="" class="mb-5 sm:hidden">
              <option value="all">Select category</option>
              <option value="Websites">Websites</option>
              <option value="Web Applications">Web Applications</option>
              <option value="Back-end">Back-end</option>
            </select>
      
            <!-- Project List -->
            <ul class="project-list">
              <li
                v-for="project in filteredProjects"
                :key="project.id"
                class="project-item active rounded-2xl border border-gray-700 p-2"
                :data-filter-item="true"
                :data-category="project.category"
              >
                <div class="">
                  <figure class="project-img">
                    <Fancybox
                      :options="{
                        placeFocusBack: true,
                        closeExisting: true,
                        Carousel: {
                          infinite: false,
                        },
                      }"
                    >
                      <a
                        :href="'storage/' + project.image"
                        data-fancybox
                        :data-caption="project.name"
                      >
                        <img
                          :src="'storage/' + project.image"
                          :alt="project.name"
                          loading="lazy"
                        />
                      </a>
                    </Fancybox>
      
                    <div class="project-item-icon-box">
                      <ion-icon name="eye-outline"></ion-icon>
                    </div>
                  </figure>
      
                  <h3 class="project-title">{{ project.name }}</h3>
                  <div class="flex justify-between">
                    <p class="project-category">{{ project.category }}</p>
                    <a target="_blank" :href="project.link" class="text-yellow-300">
                      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M18.6071 11.0353V18.9638C18.6089 19.2656 18.5506 19.5648 18.4355 19.8438C18.3204 20.1228 18.1509 20.3761 17.9368 20.5889C17.7228 20.8017 17.4685 20.9698 17.1888 21.0832C16.9092 21.1967 16.6097 21.2533 16.3079 21.2498H5.04939C4.74646 21.2534 4.44589 21.1963 4.16533 21.082C3.88476 20.9677 3.62988 20.7985 3.41567 20.5843C3.20145 20.3701 3.03222 20.1152 2.91793 19.8346C2.80363 19.5541 2.74658 19.2535 2.75012 18.9506V7.69209C2.74658 7.38916 2.80363 7.08859 2.91793 6.80803C3.03222 6.52747 3.20145 6.27258 3.41567 6.05837C3.62988 5.84415 3.88476 5.67492 4.16533 5.56063C4.44589 5.44633 4.74646 5.38928 5.04939 5.39283H12.9779" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M21.25 2.75L10.6786 13.3213" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M15.9644 2.75H21.25V8.03567" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        
                      <!-- SVG code here -->
                    </a>
                  </div>
      
                  <div id="project-techniques" class="mt-3 flex gap-2">
                    <span
                      v-for="technique in project.tech"
                      :key="technique.id"
                      class="rounded-lg border border-yellow-400/20 px-2 py-1 text-gray-400"
                    >
                      {{ technique }}
                    </span>
                  </div>
                </div>
              </li>
            </ul>
          </section>
        </div>
      </article>
      

      <article class="blog" v-if="activePage === 'blog'">

      
      </article>
      <article class="contact" v-if="activePage === 'contact'">

        <div >
          <header>
            <h2 class="h2 article-title">Contact</h2>
          </header>
  
         
          <section class="contact-form">
            <h3 class="h3 form-title">Contact Form</h3>
  
            <form action="#" class="form" data-form>
              <div class="input-wrapper">
                <input
                  type="text"
                  name="fullname"
                  class="form-input"
                  placeholder="Full name"
                  required
                  data-form-input
                />
  
                <input
                  type="email"
                  name="email"
                  class="form-input"
                  placeholder="Email address"
                  required
                  data-form-input
                />
              </div>
  
              <textarea
                name="message"
                class="form-input"
                placeholder="Your Message"
                required
                data-form-input
              ></textarea>
  
              <button class="form-btn" type="submit" disabled data-form-btn>
                <ion-icon name="paper-plane"></ion-icon>
                <span>Send Message</span>
              </button>
            </form>
          </section>
        </div>
      </article>


      <!-- </article> -->
    </div>


    
  </Layout>
</template>
