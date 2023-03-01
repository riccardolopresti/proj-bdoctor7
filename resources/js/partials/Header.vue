<script>
export default {
    name: "Header",

    methods: {
        toggleMenu() {
            const hamburger = document.querySelector(".hamburger");
            const navLinks = document.querySelector(".nav-links");
            const links = document.querySelectorAll(".nav-links li");
            //Links
            navLinks.classList.toggle("open");
            links.forEach((link) => {
                link.classList.toggle("fade");
            });

            //Animation
            hamburger.classList.toggle("toggle");
        },
    },
};
</script>

<template>
    <header>
        <nav>
            <div class="logo">
                <router-link :to="{ name: 'home' }">
                    <img src="/logo-doc-transp.png" alt="Logo Doc" />
                </router-link>
            </div>
            <div @click="toggleMenu" class="hamburger">
                <div class="bars1"></div>
                <div class="bars2"></div>
                <div class="bars3"></div>
            </div>
            <ul class="nav-links">
                <li><router-link :to="{ name: 'home' }">Home</router-link></li>
                <li v-if="$route.path !== '/search'">
                    <a href="#about-us">chi siamo</a>
                </li>
                <li v-if="$route.path !== '/search'">
                    <a href="#spons-doc">Medici in evidenza</a>
                </li>
                <li><a href="/login" id="login-button">Accedi</a></li>
            </ul>
        </nav>
    </header>
</template>

<style scoped>
* {
    color: #f2f5f7;
    letter-spacing: 1px;
    font-weight: 300;
}

header {
    height: 96px;
}

body {
    overflow: hidden;
}

nav {
    height: 6rem;
    width: 100vw;
    display: flex;
    align-items: center;
    justify-content: space-between;
    position: fixed;
    z-index: 10;
    background: rgb(55, 130, 232);
    box-shadow: 0 3px 20px rgba(0, 0, 0, 0.3);
}

/* Styling Logo*/

.logo {
    width: 250px;
}

.logo img {
    max-width: 100%;
}

/* Styling Navigation Links*/

.nav-links {
    width: 80vw;
    display: flex;
    padding: 0 0.7vw;
    justify-content: end;
    align-items: center;
    text-transform: uppercase;
    list-style: none;
    font-weight: 600;
    margin: 0;
}

.nav-links li a {
    margin: 0 0.7vw;
    text-decoration: none;
    transition: all ease-in-out 350ms;
    padding: 10px;
}

.nav-links li a:hover,
.nav-links li a.active {
    color: #000;
    background-color: #fff;
    padding: 10px;
    border-radius: 50px;
}

.nav-links li {
    position: relative;
}

.nav-links li a:hover::before {
    width: 80%;
}

/*Buttons Styling*/

#login-button {
    padding: 0.6rem 0.8rem;
    /* margin-left: 2vw; */
    font-size: 1rem;
    cursor: pointer;
    background-color: transparent;
    border: 1.5px solid #f2f5f7;
    border-radius: 2em;
}

#login-button:hover {
    color: #fff;
    background-color: #dd5f24;
    border: 1.5px solid #dd5f24;
    transition: all ease-in-out 350ms;
}

/*Navigation Icon Styling*/

.hamburger div {
    width: 30px;
    height: 3px;
    background: #f2f5f7;
    margin: 5px;
    transition: all 0.3s ease;
}

.hamburger {
    display: none;
}

/*Responsive Adding Media Queries*/

@media screen and (max-width: 800px) {
    nav {
        position: fixed;
        z-index: 3;
    }
    .hamburger {
        display: block;
        position: absolute;
        cursor: pointer;
        right: 5%;
        top: 50%;
        transform: translate(-5%, -50%);
        z-index: 2;
        transition: all 0.7s ease;
    }
    .nav-links {
        background: rgb(55, 130, 232);
        position: fixed;
        bottom: 50%;
        opacity: 1;
        height: 50vh;
        width: 100%;
        flex-direction: column;
        justify-content: start;
        clip-path: circle(50px at 90% -20%);
        -webkit-clip-path: circle(50px at 90% -10%);
        transition: all 1s ease-out;
        pointer-events: none;
    }
    .nav-links.open {
        clip-path: circle(1000px at 90% -10%);
        -webkit-clip-path: circle(1000px at 90% -10%);
        pointer-events: all;
        padding-top: 80px;
    }
    .nav-links li {
        opacity: 0;
        margin: 20px 0;
    }
    .nav-links li:nth-child(1) {
        transition: all 0.5s ease 0.2s;
        margin: 40px 0 10px 0;
    }
    .nav-links li:nth-child(2) {
        transition: all 0.5s ease 0.4s;
    }
    .nav-links li:nth-child(3) {
        transition: all 0.5s ease 0.6s;
    }
    .nav-links li:nth-child(4) {
        transition: all 0.5s ease 0.7s;
    }
    .nav-links li:nth-child(5) {
        transition: all 0.5s ease 0.8s;
    }
    .nav-links li:nth-child(6) {
        transition: all 0.5s ease 0.9s;
        margin: 0;
    }
    .nav-links li:nth-child(7) {
        transition: all 0.5s ease 1s;
        margin: 0;
    }

    li.fade {
        opacity: 1;
    }

    /* Navigation Bar Icon on Click*/

    .toggle .bars1 {
        transform: rotate(-45deg) translate(-5px, 6px);
    }

    .toggle .bars2 {
        transition: all 0s ease;
        width: 0;
    }

    .toggle .bars3 {
        transform: rotate(45deg) translate(-5px, -6px);
    }
}
</style>
