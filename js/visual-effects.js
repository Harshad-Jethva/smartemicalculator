/**
 * Advanced Visual Effects using Three.js and GSAP
 * Implements a floating 3D background and scroll animations.
 */

document.addEventListener('DOMContentLoaded', () => {

    // --- 1. Three.js Background Animation ---
    const initThreeJS = () => {
        const bgContainer = document.getElementById('three-bg');
        if (!bgContainer) {
            // Create container if it implies global use but not present (fallback)
            const div = document.createElement('div');
            div.id = 'three-bg';
            div.style.position = 'fixed';
            div.style.top = '0';
            div.style.left = '0';
            div.style.width = '100%';
            div.style.height = '100%';
            div.style.zIndex = '-1';
            div.style.pointerEvents = 'none';
            div.style.opacity = '0.4'; // Subtle overlay
            document.body.prepend(div);
        }

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });

        renderer.setSize(window.innerWidth, window.innerHeight);
        document.getElementById('three-bg').appendChild(renderer.domElement);

        // Pastel Geometry
        const geometry = new THREE.IcosahedronGeometry(1, 0);
        const particles = [];
        const colors = [0xfbf8cc, 0xffcfd2, 0xcfbaf0, 0xa3c4f3, 0x98f5e1];

        for (let i = 0; i < 20; i++) {
            const material = new THREE.MeshBasicMaterial({
                color: colors[Math.floor(Math.random() * colors.length)],
                wireframe: true,
                transparent: true,
                opacity: 0.6
            });
            const mesh = new THREE.Mesh(geometry, material);

            mesh.position.x = (Math.random() - 0.5) * 15;
            mesh.position.y = (Math.random() - 0.5) * 15;
            mesh.position.z = (Math.random() - 0.5) * 10;

            mesh.rotation.x = Math.random() * Math.PI;
            mesh.rotation.y = Math.random() * Math.PI;

            const scale = Math.random() * 0.5 + 0.2;
            mesh.scale.set(scale, scale, scale);

            scene.add(mesh);
            particles.push({
                mesh: mesh,
                speedX: (Math.random() - 0.5) * 0.005,
                speedY: (Math.random() - 0.5) * 0.005,
                rotSpeed: Math.random() * 0.01
            });
        }

        camera.position.z = 5;

        // Animation Loop
        const animate = () => {
            requestAnimationFrame(animate);

            particles.forEach(p => {
                p.mesh.rotation.x += p.rotSpeed;
                p.mesh.rotation.y += p.rotSpeed;
                p.mesh.position.x += p.speedX;
                p.mesh.position.y += p.speedY;

                // Wrap around
                if (p.mesh.position.y > 8) p.mesh.position.y = -8;
                if (p.mesh.position.y < -8) p.mesh.position.y = 8;
                if (p.mesh.position.x > 10) p.mesh.position.x = -10;
                if (p.mesh.position.x < -10) p.mesh.position.x = 10;
            });

            // Mouse interaction parallax
            camera.position.x += (mouseX - camera.position.x) * 0.05;
            camera.position.y += (-mouseY - camera.position.y) * 0.05;
            camera.lookAt(scene.position);

            renderer.render(scene, camera);
        };

        // Mouse Parallax Logic
        let mouseX = 0;
        let mouseY = 0;
        document.addEventListener('mousemove', (e) => {
            mouseX = (e.clientX - window.innerWidth / 2) / 200;
            mouseY = (e.clientY - window.innerHeight / 2) / 200;
        });

        window.addEventListener('resize', () => {
            camera.aspect = window.innerWidth / window.innerHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(window.innerWidth, window.innerHeight);
        });

        animate();
    };

    // --- 2. GSAP Animations ---
    const initGSAP = () => {
        gsap.registerPlugin(ScrollTrigger);

        // Navbar Float
        gsap.from("#navbar", {
            y: -100,
            opacity: 0,
            duration: 1,
            ease: "power4.out"
        });

        // Hero Content Stagger
        const heroElements = document.querySelectorAll('.animate-fade-in-up');
        if (heroElements.length) {
            gsap.from(heroElements, {
                y: 50,
                opacity: 0,
                duration: 1,
                stagger: 0.2,
                ease: "power3.out",
                delay: 0.5
            });
        }

        // Feature Cards - Pop in on scroll
        const cards = document.querySelectorAll('#features > div');
        if (cards.length) {
            gsap.from(cards, {
                scrollTrigger: {
                    trigger: "#features",
                    start: "top 80%",
                },
                y: 100,
                opacity: 0,
                duration: 0.8,
                stagger: 0.15,
                ease: "back.out(1.7)"
            });
        }

        // Calculator Entry
        gsap.from("#calculator", {
            scrollTrigger: {
                trigger: "#calculator",
                start: "top 85%",
            },
            scale: 0.95,
            opacity: 0,
            duration: 0.8,
            ease: "power2.out"
        });
    };

    // Init
    initThreeJS();
    initGSAP();

});
