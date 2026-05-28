import { gsap } from 'gsap';
import confetti from 'canvas-confetti';
import Lenis from 'lenis';

// Mobile check helper
const isMobile = window.innerWidth < 768;

// Initialize Premium Lenis Smooth Scroll only on desktop for 60fps/120fps GPU performance on mobile
let lenis;
if (!isMobile) {
    lenis = new Lenis({
        duration: 1.3,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)), // Damping curve
        smooth: true,
        smoothTouch: false, // Maintain native smooth scrolling on mobile
    });

    function raf(time) {
        if (lenis) lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);
}


document.addEventListener('DOMContentLoaded', () => {
    // --------------------------------------------------------------------------
    // 1. GLOBAL STATE & UTILITIES
    // --------------------------------------------------------------------------
    const partnerName = document.getElementById('loader-name')?.innerText.trim() || 'Denaku';
    let isMusicPlaying = false;
    const isMobile = window.innerWidth < 768;

    // --------------------------------------------------------------------------
    // 2. CUSTOM ROMANTIC HEART CURSOR
    // --------------------------------------------------------------------------
    const cursor = document.getElementById('custom-cursor');
    
    if (cursor && !isMobile) {
        document.addEventListener('mousemove', (e) => {
            gsap.to(cursor, {
                x: e.clientX,
                y: e.clientY,
                duration: 0.1,
                ease: 'power2.out'
            });
        });

        // Click ripples & trails
        document.addEventListener('click', (e) => {
            const trail = document.createElement('div');
            trail.className = 'cursor-trail select-none';
            trail.innerHTML = '❤️';
            trail.style.left = e.clientX + 'px';
            trail.style.top = e.clientY + 'px';
            document.body.appendChild(trail);

            // Remove trail after animation completes
            setTimeout(() => {
                trail.remove();
            }, 800);

            // Scale dot on click
            const dot = cursor.querySelector('.custom-cursor-dot');
            if (dot) {
                gsap.fromTo(dot, 
                    { scale: 1 }, 
                    { scale: 2.2, duration: 0.25, yoyo: true, repeat: 1 }
                );
            }
        });

        // Hover scales
        const hoverables = document.querySelectorAll('button, a, .cursor-pointer');
        hoverables.forEach(item => {
            item.addEventListener('mouseenter', () => {
                gsap.to(cursor.querySelector('.custom-cursor-heart'), { scale: 1.4, duration: 0.2 });
            });
            item.addEventListener('mouseleave', () => {
                gsap.to(cursor.querySelector('.custom-cursor-heart'), { scale: 1, duration: 0.2 });
            });
        });

        // Magical Glitter Heart Cursor Trail inside Hero Section
        const heroSection = document.getElementById('hero-section');
        if (heroSection && !isMobile) {
            heroSection.addEventListener('mousemove', (e) => {
                if (Math.random() > 0.12) return; // limit spawning rate to keep it performant
                
                const rect = heroSection.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const particle = document.createElement('div');
                particle.className = 'absolute pointer-events-none select-none text-pink-400/80 font-bold z-30';
                particle.innerHTML = Math.random() > 0.55 ? '❤️' : '✨';
                particle.style.fontSize = Math.random() * 8 + 8 + 'px';
                particle.style.left = x + 'px';
                particle.style.top = y + 'px';
                
                heroSection.appendChild(particle);
                
                gsap.fromTo(particle,
                    { scale: 0.5, opacity: 0.8, y: 0, rotate: Math.random() * 360 },
                    { 
                        scale: 1.3, 
                        opacity: 0, 
                        y: Math.random() * 30 + 15, 
                        x: Math.random() * 20 - 10,
                        rotate: '+=120',
                        duration: 1.1, 
                        ease: 'power1.out', 
                        onComplete: () => particle.remove() 
                    }
                );
            });
        }
    }

    // --------------------------------------------------------------------------
    // 3. GLOBAL FLOATING HEARTS BACKGROUND CANVAS (Hearts floating upward)
    // --------------------------------------------------------------------------
    const heartsCanvas = document.getElementById('hearts-canvas');
    if (heartsCanvas) {
        const ctx = heartsCanvas.getContext('2d');
        let hearts = [];
        let mouse = { x: -1000, y: -1000 };

        const resizeCanvas = () => {
            heartsCanvas.width = window.innerWidth;
            heartsCanvas.height = window.innerHeight;
        };
        window.addEventListener('resize', resizeCanvas);
        resizeCanvas();

        window.addEventListener('mousemove', (e) => {
            mouse.x = e.clientX;
            mouse.y = e.clientY;
        });

        class FloatingHeart {
            constructor() {
                this.reset();
                this.y = Math.random() * heartsCanvas.height; // Spreading initially
            }

            reset() {
                this.x = Math.random() * heartsCanvas.width;
                this.y = heartsCanvas.height + 20;
                this.size = Math.random() * 8 + 6;
                this.speedY = Math.random() * 0.7 + 0.3;
                this.speedX = Math.random() * 0.4 - 0.2;
                this.opacity = Math.random() * 0.4 + 0.15;
                this.color = Math.random() > 0.5 ? '#ffd1dc' : '#ffb7c5';
                this.angle = Math.random() * 360;
                this.angleSpeed = Math.random() * 0.5 - 0.25;
            }

            update() {
                this.y -= this.speedY;
                this.x += this.speedX;
                this.angle += this.angleSpeed;

                const dx = this.x - mouse.x;
                const dy = this.y - mouse.y;
                const dist = Math.hypot(dx, dy);
                if (dist < 120) {
                    const force = (120 - dist) / 120;
                    this.x += (dx / dist) * force * 1.5;
                    this.y += (dy / dist) * force * 1.5;
                }

                if (this.y < -20 || this.x < -20 || this.x > heartsCanvas.width + 20) {
                    this.reset();
                }
            }

            draw() {
                ctx.save();
                ctx.translate(this.x, this.y);
                ctx.rotate((this.angle * Math.PI) / 180);
                ctx.globalAlpha = this.opacity;
                ctx.fillStyle = this.color;
                
                ctx.beginPath();
                ctx.moveTo(0, 0);
                ctx.bezierCurveTo(-this.size / 2, -this.size / 2, -this.size, this.size / 3, 0, this.size);
                ctx.bezierCurveTo(this.size, this.size / 3, this.size / 2, -this.size / 2, 0, 0);
                ctx.closePath();
                ctx.fill();
                ctx.restore();
            }
        }

        const maxHearts = isMobile ? 25 : 60;
        for (let i = 0; i < maxHearts; i++) {
            hearts.push(new FloatingHeart());
        }

        const animateHearts = () => {
            requestAnimationFrame(animateHearts);
            if (document.visibilityState === 'hidden') return;

            ctx.clearRect(0, 0, heartsCanvas.width, heartsCanvas.height);
            hearts.forEach(heart => {
                heart.update();
                heart.draw();
            });
        };
        animateHearts();
    }

    // --------------------------------------------------------------------------
    // 4. STARFIELD BACKGROUND IN INTRO SCREEN (#loader-stars)
    // --------------------------------------------------------------------------
    const loaderStarsCanvas = document.getElementById('loader-stars');
    if (loaderStarsCanvas) {
        const ctx = loaderStarsCanvas.getContext('2d');
        let stars = [];

        const resizeStars = () => {
            loaderStarsCanvas.width = window.innerWidth;
            loaderStarsCanvas.height = window.innerHeight;
        };
        window.addEventListener('resize', resizeStars);
        resizeStars();

        class Star {
            constructor() {
                this.x = Math.random() * loaderStarsCanvas.width;
                this.y = Math.random() * loaderStarsCanvas.height;
                this.size = Math.random() * 1.5;
                this.opacity = Math.random();
                this.speed = Math.random() * 0.01 + 0.005;
            }

            update() {
                this.opacity += this.speed;
                if (this.opacity > 1 || this.opacity < 0) {
                    this.speed = -this.speed;
                }
            }

            draw() {
                ctx.save();
                ctx.globalAlpha = this.opacity;
                ctx.fillStyle = '#ffffff';
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
                ctx.restore();
            }
        }

        class IntroShootingStar {
            constructor() {
                this.reset();
                this.active = false;
            }
            reset() {
                this.x = Math.random() * loaderStarsCanvas.width * 0.9;
                this.y = -20;
                this.length = Math.random() * 60 + 45;
                this.speed = Math.random() * 5 + 3.5;
                this.opacity = Math.random() * 0.8 + 0.2;
                this.angle = 135; // degrees, downwards & leftwards
                this.active = true;
            }
            update() {
                if (!this.active) return;
                const rad = (this.angle * Math.PI) / 180;
                this.x += Math.cos(rad) * this.speed;
                this.y -= Math.sin(rad) * this.speed;
                this.opacity -= 0.008;
                if (this.opacity <= 0 || this.y > loaderStarsCanvas.height || this.x < -50) {
                    this.active = false;
                }
            }
            draw() {
                if (!this.active) return;
                ctx.save();
                ctx.globalAlpha = this.opacity;
                const grad = ctx.createLinearGradient(
                    this.x, this.y,
                    this.x - Math.cos((this.angle * Math.PI) / 180) * this.length,
                    this.y + Math.sin((this.angle * Math.PI) / 180) * this.length
                );
                grad.addColorStop(0, '#ffffff');
                grad.addColorStop(0.3, '#ffb7c5');
                grad.addColorStop(1, 'rgba(255,183,197,0)');
                ctx.strokeStyle = grad;
                ctx.lineWidth = 1.8;
                ctx.beginPath();
                ctx.moveTo(this.x, this.y);
                ctx.lineTo(
                    this.x - Math.cos((this.angle * Math.PI) / 180) * this.length,
                    this.y + Math.sin((this.angle * Math.PI) / 180) * this.length
                );
                ctx.stroke();
                ctx.restore();
            }
        }

        for (let i = 0; i < 75; i++) {
            stars.push(new Star());
        }

        let introShootStar = new IntroShootingStar();
        let auroraTime = 0;

        const animateStars = () => {
            if (!document.getElementById('cinematic-loader')) return;
            requestAnimationFrame(animateStars);
            if (document.visibilityState === 'hidden') return;

            ctx.clearRect(0, 0, loaderStarsCanvas.width, loaderStarsCanvas.height);
            
            // 1. Draw soft, elegant romantic aurora glow waves
            auroraTime += 0.002;
            let auroraGrad = ctx.createLinearGradient(0, 0, loaderStarsCanvas.width, 0);
            auroraGrad.addColorStop(0, 'rgba(255, 183, 197, 0.07)'); // soft pink
            auroraGrad.addColorStop(0.5, 'rgba(230, 230, 250, 0.06)'); // soft lavender
            auroraGrad.addColorStop(1, 'rgba(255, 183, 197, 0.07)'); // soft pink
            
            ctx.save();
            ctx.fillStyle = auroraGrad;
            ctx.beginPath();
            ctx.moveTo(0, loaderStarsCanvas.height * 0.45);
            for (let x = 0; x < loaderStarsCanvas.width; x += 15) {
                let y = loaderStarsCanvas.height * 0.42 + Math.sin(x * 0.004 + auroraTime) * 35 + Math.cos(x * 0.002 - auroraTime) * 20;
                ctx.lineTo(x, y);
            }
            ctx.lineTo(loaderStarsCanvas.width, loaderStarsCanvas.height);
            ctx.lineTo(0, loaderStarsCanvas.height);
            ctx.closePath();
            ctx.fill();
            ctx.restore();

            // 2. Draw stars
            stars.forEach(star => {
                star.update();
                star.draw();
            });

            // 3. Draw and spawn intro shooting stars
            if (!introShootStar.active && Math.random() < 0.004) {
                introShootStar.reset();
            }
            if (introShootStar.active) {
                introShootStar.update();
                introShootStar.draw();
            }
        };
        animateStars();
    }

    // --------------------------------------------------------------------------
    // 5. INTRO TYPEWRITER & GSAP TIMELINE
    // --------------------------------------------------------------------------
    const subtitleEl = document.getElementById('loader-subtitle');
    const nameEl = document.getElementById('loader-name');
    const actionEl = document.getElementById('loader-action');
    const skipEl = document.getElementById('loader-skip');
    const contentEl = document.getElementById('app-content');
    const loaderEl = document.getElementById('cinematic-loader');

    const introText = "Someone loves you more than words can explain...";
    let textIndex = 0;

    const runTypewriter = () => {
        if (textIndex < introText.length) {
            subtitleEl.innerHTML += introText.charAt(textIndex);
            textIndex++;
            setTimeout(runTypewriter, 60);
        } else {
            gsap.to(nameEl, {
                opacity: 1,
                scale: 1.1,
                filter: 'drop-shadow(0 0 25px rgba(255, 183, 197, 0.9))',
                duration: 1.5,
                ease: 'power3.out',
                onComplete: () => {
                    gsap.to(actionEl, {
                        opacity: 1,
                        y: 0,
                        duration: 1,
                        ease: 'back.out(1.7)'
                    });
                }
            });
        }
    };

    setTimeout(runTypewriter, 1000);

    // --------------------------------------------------------------------------
    // 6. ENTRANCE ACTION & REVEAL MAIN PAGE
    // --------------------------------------------------------------------------
    const audio = document.getElementById('romantic-audio');
    const openBtn = document.getElementById('btn-open-surprise');
    const skipBtn = document.getElementById('btn-skip-intro');

    const triggerSurpriseTransition = () => {
        if (audio && !isMusicPlaying) {
            playMusic();
        }

        gsap.to(loaderEl, {
            opacity: 0,
            scale: 1.05,
            duration: 1.5,
            ease: 'power3.inOut',
            onComplete: () => {
                loaderEl.style.display = 'none';
                loaderEl.remove();

                contentEl.classList.remove('hidden');
                gsap.fromTo(contentEl, 
                    { opacity: 0 }, 
                    { opacity: 1, duration: 1.2, ease: 'power2.out' }
                );

                const player = document.getElementById('floating-music-player');
                if (player) {
                    gsap.to(player, {
                        y: 0,
                        opacity: 1,
                        duration: 1,
                        ease: 'back.out(1.5)',
                        delay: 0.8
                    });
                }

                runHeroTypewriter();
            }
        });
    };

    if (openBtn) openBtn.addEventListener('click', triggerSurpriseTransition);
    if (skipBtn) skipBtn.addEventListener('click', triggerSurpriseTransition);

    // --------------------------------------------------------------------------
    // 7. HERO TYPEWRITER
    // --------------------------------------------------------------------------
    const heroTypewriterEl = document.getElementById('hero-typewriter');
    const heroSubtexts = [
        "Hari ini adalah hari istimewa buatmu... 🌸",
        "Hari di mana bintang tercantik lahir ke duniaku! ✨",
        "Gulir layar ke bawah untuk melihat perjalanan cinta kita... 💕"
    ];
    let subtextIndex = 0;
    let charIndex = 0;

    const runHeroTypewriter = () => {
        if (!heroTypewriterEl) return;
        
        const currentText = heroSubtexts[subtextIndex];
        if (charIndex < currentText.length) {
            heroTypewriterEl.innerHTML += currentText.charAt(charIndex);
            charIndex++;
            setTimeout(runHeroTypewriter, 50);
        } else {
            setTimeout(() => {
                deleteHeroTypewriter();
            }, 2500);
        }
    };

    const deleteHeroTypewriter = () => {
        const currentText = heroSubtexts[subtextIndex];
        if (charIndex > 0) {
            heroTypewriterEl.innerHTML = currentText.substring(0, charIndex - 1);
            charIndex--;
            setTimeout(deleteHeroTypewriter, 25);
        } else {
            subtextIndex = (subtextIndex + 1) % heroSubtexts.length;
            setTimeout(runHeroTypewriter, 500);
        }
    };

    setTimeout(() => {
        const scrollIndicator = document.getElementById('hero-scroll-indicator');
        if (scrollIndicator) {
            gsap.to(scrollIndicator, { opacity: 1, y: 0, duration: 1 });
        }
    }, 4500);

    // --------------------------------------------------------------------------
    // 8. INTERACTIVE LOVE LETTER (Envelope opening mechanics)
    // --------------------------------------------------------------------------
    const envelopeWrapper = document.getElementById('romantic-envelope-wrapper');
    const letterEl = document.getElementById('envelope-letter');

    if (envelopeWrapper) {
        envelopeWrapper.addEventListener('click', (e) => {
            if (e.target.closest('#envelope-letter')) return;

            const isOpen = envelopeWrapper.classList.contains('open');

            if (!isOpen) {
                envelopeWrapper.classList.add('open');
                gsap.to(letterEl, {
                    rotation: 0.01,
                    duration: 0.6,
                    ease: 'power3.out'
                });
            } else {
                envelopeWrapper.classList.remove('open');
            }
        });
    }

    // --------------------------------------------------------------------------
    // 9. 3D TILT PHOTO GRID (Pinterest Scrapbook Polaroid Hover Mechanics)
    // --------------------------------------------------------------------------
    const polaroidFrames = document.querySelectorAll('.polaroid-frame');
    
    polaroidFrames.forEach(frame => {
        if (isMobile) return;
        if (frame.closest('#hero-section')) return; // Handle hero cards separately for ultra-premium tilts
        
        frame.addEventListener('mousemove', (e) => {
            const rect = frame.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const tiltX = (y - centerY) / 8;
            const tiltY = (centerX - x) / 8;

            gsap.to(frame, {
                rotateX: tiltX,
                rotateY: tiltY,
                transformPerspective: 800,
                scale: 1.04,
                duration: 0.3,
                ease: 'power2.out'
            });
        });

        frame.addEventListener('mouseleave', () => {
            const originalRotationStr = frame.parentElement.style.getPropertyValue('--rotation') || '0deg';
            const originalRotation = parseFloat(originalRotationStr) || 0;
            
            gsap.to(frame, {
                rotateX: 0,
                rotateY: 0,
                rotateZ: originalRotation,
                scale: 1,
                duration: 0.5,
                ease: 'elastic.out(1, 0.4)'
            });
        });
    });

    // --------------------------------------------------------------------------
    // 9.5 HERO FANNED POLAROID EXTRA-CUTE HOVER MECHANICS
    const heroPolaroids = document.querySelectorAll('#hero-section .cursor-pointer, #hero-section .pointer-events-auto');
    
    heroPolaroids.forEach(card => {
        card.addEventListener('mouseenter', () => {
            // Retrieve original miring rotation from styling classes or direct styles
            gsap.to(card, {
                y: -30,
                scale: 1.08,
                rotate: 0,
                zIndex: 35,
                filter: 'drop-shadow(0 20px 35px rgba(255, 110, 130, 0.45))',
                duration: 0.4,
                ease: 'back.out(1.6)'
            });

            // Trigger beautiful small sparkles when hovered!
            for (let i = 0; i < 5; i++) {
                spawnCardSparkle(card);
            }
        });

        card.addEventListener('mouseleave', () => {
            // Read rotation from default positioning
            let defaultRotate = 0;
            if (card.classList.contains('rotate-[-15deg]')) defaultRotate = -15;
            else if (card.classList.contains('rotate-[-6deg]')) defaultRotate = -6;
            else if (card.classList.contains('rotate-[4deg]')) defaultRotate = 4;
            else if (card.classList.contains('rotate-[14deg]')) defaultRotate = 14;

            let defaultZ = 10;
            if (card.classList.contains('z-20')) defaultZ = 20;
            else if (card.classList.contains('z-15')) defaultZ = 15;

            gsap.to(card, {
                y: 0,
                scale: 1,
                rotate: defaultRotate,
                zIndex: defaultZ,
                filter: 'drop-shadow(0 10px 20px rgba(255, 183, 197, 0.2))',
                duration: 0.5,
                ease: 'elastic.out(1.1, 0.45)'
            });
        });
    });

    // --------------------------------------------------------------------------
    // 9.6 EASTER EGG CROWN CLICK DETECTOR (3 clicks triggers Secret Scroll)
    // --------------------------------------------------------------------------
    const crownTrigger = document.getElementById('hero-crown-trigger');
    const centerPolaroid = document.getElementById('hero-center-polaroid');
    const easterEggModal = document.getElementById('easter-egg-modal');
    const closeEasterEggBtn = document.getElementById('btn-close-easter-egg');
    const easterEggOverlay = document.getElementById('easter-egg-overlay');
    
    let crownClickCount = 0;
    
    const triggerEasterEggLetter = () => {
        crownClickCount++;
        
        // Spawn small floating pink crowns on clicks
        const clickEmoji = document.createElement('div');
        clickEmoji.className = 'absolute text-xl pointer-events-none select-none z-50 animate-ping';
        clickEmoji.innerHTML = '👑';
        if (crownTrigger) {
            crownTrigger.appendChild(clickEmoji);
            setTimeout(() => clickEmoji.remove(), 800);
        }

        if (crownClickCount >= 3) {
            crownClickCount = 0; // reset
            
            // Trigger overlay fade-in
            if (easterEggModal) {
                easterEggModal.classList.remove('hidden');
                easterEggModal.classList.add('flex');
                
                // Dim screen, blur background
                gsap.fromTo(easterEggModal,
                    { opacity: 0 },
                    { opacity: 1, duration: 0.6, ease: 'power2.out' }
                );

                gsap.fromTo(easterEggModal.querySelector('.glassmorphism'),
                    { scale: 0.8, y: 50 },
                    { scale: 1, y: 0, duration: 0.8, ease: 'back.out(1.5)' }
                );
                
                // Spawn royal sparkly confetti shower!
                confetti({
                    particleCount: 40,
                    spread: 80,
                    origin: { y: 0.4 },
                    colors: ['#fecdd3', '#f472b6', '#fcd34d']
                });
            }
        }
    };

    if (crownTrigger) {
        crownTrigger.addEventListener('click', (e) => {
            e.stopPropagation(); // Prevent polaroid card's main hover/click clashing
            triggerEasterEggLetter();
        });
    } else if (centerPolaroid) {
        // Fallback to clicking center polaroid card
        centerPolaroid.addEventListener('click', triggerEasterEggLetter);
    }

    const closeEasterEgg = () => {
        if (easterEggModal) {
            gsap.to(easterEggModal, {
                opacity: 0,
                duration: 0.4,
                ease: 'power2.in',
                onComplete: () => {
                    easterEggModal.classList.add('hidden');
                    easterEggModal.classList.remove('flex');
                }
            });
        }
    };

    if (closeEasterEggBtn) closeEasterEggBtn.addEventListener('click', closeEasterEgg);
    if (easterEggOverlay) easterEggOverlay.addEventListener('click', closeEasterEgg);

    const spawnCardSparkle = (card) => {
        const sparkle = document.createElement('div');
        sparkle.className = 'absolute pointer-events-none select-none text-rose-500 font-bold';
        sparkle.innerHTML = Math.random() > 0.5 ? '❤️' : '✨';
        sparkle.style.fontSize = Math.random() * 8 + 10 + 'px';
        
        // Random layout coordinates inside/around the polaroid
        const rect = card.getBoundingClientRect();
        sparkle.style.left = Math.random() * rect.width + 'px';
        sparkle.style.top = Math.random() * rect.height + 'px';
        sparkle.style.zIndex = 50;
        
        card.appendChild(sparkle);

        gsap.fromTo(sparkle,
            { scale: 0.4, opacity: 1, y: 0 },
            { scale: 1.3, opacity: 0, y: -40, duration: 0.9, ease: 'power2.out', onComplete: () => sparkle.remove() }
        );
    };

    // --------------------------------------------------------------------------
    // 10. GALLERY FULLSCREEN LIGHTBOX MODAL
    // --------------------------------------------------------------------------
    const modal = document.getElementById('gallery-modal');
    const modalImg = document.getElementById('modal-img');
    const modalFallback = document.getElementById('modal-fallback');
    const modalFallbackEmoji = document.getElementById('modal-fallback-emoji');
    const modalCaption = document.getElementById('modal-caption');
    const closeGalleryBtn = document.getElementById('btn-close-gallery');
    const modalOverlay = document.getElementById('gallery-modal-overlay');

    const modalEmojis = ['🧸', '🍕', '🍿', '✈️', '🍦', '🌅'];

    const openLightbox = (imagePath, caption, index) => {
        if (!modal) return;
        
        modalCaption.innerText = caption;

        if (imagePath && imagePath.length > 0) {
            // Show loading state
            modalImg.src = '';
            modalImg.classList.add('hidden');
            modalFallback.classList.remove('hidden');
            modalFallbackEmoji.innerText = '⏳';
            
            // Preload image
            const img = new Image();
            img.onload = () => {
                modalImg.src = imagePath;
                modalImg.classList.remove('hidden');
                modalFallback.classList.add('hidden');
            };
            img.onerror = () => {
                modalImg.classList.add('hidden');
                modalFallback.classList.remove('hidden');
                modalFallbackEmoji.innerText = modalEmojis[index % modalEmojis.length];
            };
            img.src = imagePath;
        } else {
            modalImg.classList.add('hidden');
            modalImg.src = '';
            modalFallback.classList.remove('hidden');
            modalFallbackEmoji.innerText = modalEmojis[index % modalEmojis.length];
        }

        modal.classList.remove('hidden');
        modal.classList.add('flex');
        
        gsap.fromTo(modal, 
            { opacity: 0 }, 
            { opacity: 1, duration: 0.35, ease: 'power2.out' }
        );
        
        gsap.fromTo(modal.querySelector('.glassmorphism'), 
            { scale: 0.85, y: 30 },
            { scale: 1, y: 0, duration: 0.4, ease: 'back.out(1.5)' }
        );
    };

    const closeLightbox = () => {
        if (!modal) return;
        gsap.to(modal, {
            opacity: 0,
            duration: 0.3,
            ease: 'power2.in',
            onComplete: () => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
                modalImg.src = ''; // cleanup
            }
        });
    };

    // Gallery polaroid click - data is on the frame itself
    const frames = document.querySelectorAll('.polaroid-item .polaroid-frame');
    frames.forEach(frame => {
        frame.addEventListener('click', () => {
            const imagePath = frame.getAttribute('data-image-path');
            const caption = frame.getAttribute('data-caption');
            const index = parseInt(frame.getAttribute('data-index')) || 0;
            openLightbox(imagePath, caption, index);
        });
    });

    // Hero polaroid click - open lightbox too
    const heroFrames = document.querySelectorAll('#hero-section .polaroid-frame');
    heroFrames.forEach(frame => {
        frame.addEventListener('click', () => {
            const img = frame.querySelector('img');
            const caption = frame.querySelector('p')?.innerText || '';
            const imagePath = img && !img.classList.contains('hidden') ? img.src : '';
            openLightbox(imagePath, caption, 0);
        });
    });

    if (closeGalleryBtn) closeGalleryBtn.addEventListener('click', closeLightbox);
    if (modalOverlay) modalOverlay.addEventListener('click', closeLightbox);

    // Close on Escape key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
            closeLightbox();
        }
    });

    // --------------------------------------------------------------------------
    // 11. 3D TILT WHY I LOVE YOU CARDS
    // --------------------------------------------------------------------------
    const reasonCards = document.querySelectorAll('.reason-card');
    reasonCards.forEach(card => {
        if (isMobile) return;
        
        card.addEventListener('mousemove', (e) => {
            const rect = card.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;
            
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
            
            const tiltX = (y - centerY) / 10;
            const tiltY = (centerX - x) / 10;

            gsap.to(card, {
                rotateX: tiltX,
                rotateY: tiltY,
                transformPerspective: 600,
                duration: 0.3,
                ease: 'power2.out'
            });
        });

        card.addEventListener('mouseleave', () => {
            gsap.to(card, {
                rotateX: 0,
                rotateY: 0,
                duration: 0.4,
                ease: 'power2.out'
            });
        });
    });

    // --------------------------------------------------------------------------
    // 11.5 COUPLE CHEMISTRY QUIZ SYSTEM
    // --------------------------------------------------------------------------
    const quizCards = document.querySelectorAll('.quiz-question-card');
    const quizWrapper = document.getElementById('quiz-card-wrapper');
    const quizHUDNum = document.getElementById('quiz-current-num');
    const quizVictory = document.getElementById('quiz-victory-screen');
    const quizRemark = document.getElementById('quiz-remark-bubble');
    const quizRemarkText = document.getElementById('quiz-remark-text');
    const gatedSurprise = document.getElementById('gated-surprise-container');

    let currentQuizIndex = 0;
    let remarkTimeout;

    // Wrong remarks array pulled dynamically if config is slow
    const wrongRemarks = [
        'Aduh sayang, masa lupa sih? Nanti kita nge-date ulang di sana biar kamu inget terus ya! 😜',
        'Hayo ngaku! Pipimu itu lho kalau lagi cemberut pengen aku cubit gemes karena lucu banget! 😡❤️',
        'Semuanya dong cantik! Nggak ada satu pun celah di diri kamu yang nggak aku suka! 💕'
    ];

    const showQuizRemark = (text) => {
        if (!quizRemark) return;
        quizRemarkText.innerText = text;
        
        clearTimeout(remarkTimeout);
        gsap.to(quizRemark, { y: 0, opacity: 1, duration: 0.4, ease: 'back.out(1.5)' });
        
        remarkTimeout = setTimeout(() => {
            gsap.to(quizRemark, { y: '150%', opacity: 0, duration: 0.3, ease: 'power2.in' });
        }, 4000);
    };

    quizCards.forEach((card, cardIndex) => {
        const buttons = card.querySelectorAll('.quiz-choice-btn');
        const correctIndex = parseInt(card.getAttribute('data-correct')) || 0;

        buttons.forEach(btn => {
            btn.addEventListener('click', () => {
                const choiceIndex = parseInt(btn.getAttribute('data-choice-index'));

                if (choiceIndex === correctIndex) {
                    // Correct! 
                    // Green active feedback
                    btn.classList.add('bg-green-100', 'border-green-300', 'text-green-800');
                    btn.querySelector('div').classList.add('bg-green-200', 'text-green-700');
                    btn.querySelector('div').innerText = '✓';

                    // Confetti spark
                    confetti({
                        particleCount: 15,
                        spread: 40,
                        origin: { y: 0.7 },
                        colors: ['#22c55e', '#86efac']
                    });

                    // Wait and slide to next question
                    setTimeout(() => {
                        btn.classList.remove('bg-green-100', 'border-green-300', 'text-green-800');
                        btn.querySelector('div').classList.remove('bg-green-200', 'text-green-700');
                        btn.querySelector('div').innerText = String.fromCharCode(65 + choiceIndex);

                        // Slide out current card
                        gsap.to(card, {
                            x: -120,
                            opacity: 0,
                            duration: 0.4,
                            ease: 'power2.in',
                            onComplete: () => {
                                card.classList.add('hidden', 'pointer-events-none');
                                
                                // Check if more questions
                                if (cardIndex < quizCards.length - 1) {
                                    currentQuizIndex++;
                                    if (quizHUDNum) quizHUDNum.innerText = currentQuizIndex + 1;
                                    
                                    const nextCard = quizCards[currentQuizIndex];
                                    nextCard.classList.remove('hidden', 'pointer-events-none');
                                    gsap.fromTo(nextCard,
                                        { x: 120, opacity: 0 },
                                        { x: 0, opacity: 1, duration: 0.5, ease: 'back.out(1.2)' }
                                    );
                                } else {
                                    // ALL CORRECT! Trigger Quiz victory
                                    triggerQuizVictory();
                                }
                            }
                        });
                    }, 800);
                } else {
                    // Incorrect Choice!
                    // Shake entire card in vibrato
                    gsap.fromTo(quizWrapper, 
                        { x: -8 }, 
                        { x: 8, duration: 0.07, repeat: 5, yoyo: true, onComplete: () => gsap.set(quizWrapper, { x: 0 }) }
                    );

                    // Show custom funny remark
                    const remark = wrongRemarks[cardIndex] || 'Oops! Coba lagi ya sayang... 😅';
                    showQuizRemark(remark);

                    // Red feedback on button
                    btn.classList.add('bg-red-50', 'border-red-200', 'text-red-800');
                    setTimeout(() => {
                        btn.classList.remove('bg-red-50', 'border-red-200', 'text-red-800');
                    }, 1000);
                }
            });
        });
    });

    const triggerQuizVictory = () => {
        // Hide top HUD header
        gsap.to(quizWrapper.querySelector('.flex.justify-between'), { opacity: 0, y: -10, duration: 0.3 });
        
        // Slide in Victory Card Screen
        quizVictory.classList.remove('hidden', 'pointer-events-none');
        gsap.to(quizVictory, {
            opacity: 1,
            y: 0,
            duration: 0.8,
            ease: 'back.out(1.4)'
        });

        // Trigger giant celebration confetti cascade
        confetti({
            particleCount: 50,
            spread: 60,
            origin: { y: 0.75 },
            colors: ['#ff85a1', '#ffb7c5', '#ff9fb2']
        });

        // UNLOCK AND REVEAL ALL GATED SURPRISES!
        if (gatedSurprise) {
            gatedSurprise.classList.remove('pointer-events-none', 'select-none', 'h-0', 'overflow-hidden');
            
            // GSAP unblur and fade reveal
            gsap.to(gatedSurprise, {
                opacity: 1,
                filter: 'blur(0px)',
                duration: 1.5,
                ease: 'power2.out',
                delay: 0.5
            });
        }
    };

    // --------------------------------------------------------------------------
    // 12. INTERACTIVE MINI GAME: HEART CATCHER
    // --------------------------------------------------------------------------
    const gameCanvas = document.getElementById('game-canvas');
    const scoreHUD = document.getElementById('game-score');
    const startScreen = document.getElementById('game-screen-start');
    const winScreen = document.getElementById('game-screen-win');
    const startBtn = document.getElementById('btn-start-game');

    if (gameCanvas) {
        const gameCtx = gameCanvas.getContext('2d');
        let gameActive = false;
        let gameScore = 0;
        let basket = { x: 0, y: 0, width: 65, height: 25, targetX: 0 };
        let fallingHearts = [];
        let particles = [];
        let heartSpawnInterval;

        const resizeGameCanvas = () => {
            const rect = gameCanvas.parentElement.getBoundingClientRect();
            gameCanvas.width = rect.width;
            gameCanvas.height = rect.height;
            basket.y = gameCanvas.height - basket.height - 15;
            basket.x = gameCanvas.width / 2 - basket.width / 2;
            basket.targetX = basket.x;
        };

        window.addEventListener('resize', resizeGameCanvas);
        resizeGameCanvas();

        const updateBasketPosition = (clientX) => {
            const rect = gameCanvas.getBoundingClientRect();
            const inputX = clientX - rect.left;
            basket.targetX = Math.max(0, Math.min(gameCanvas.width - basket.width, inputX - basket.width / 2));
        };

        gameCanvas.addEventListener('mousemove', (e) => {
            updateBasketPosition(e.clientX);
        });

        gameCanvas.addEventListener('touchmove', (e) => {
            if (e.touches && e.touches[0]) {
                updateBasketPosition(e.touches[0].clientX);
                e.preventDefault();
            }
        }, { passive: false });

        class FallingHeartItem {
            constructor() {
                this.x = Math.random() * (gameCanvas.width - 24) + 12;
                this.y = -20;
                this.size = Math.random() * 8 + 12;
                this.speed = Math.random() * 1.5 + 2;
                this.color = Math.random() > 0.35 ? '#ff4d6d' : '#ff758f';
                this.angle = Math.random() * 360;
                this.angleSpeed = Math.random() * 2 - 1;
            }

            update() {
                this.y += this.speed;
                this.angle += this.angleSpeed;
            }

            draw() {
                gameCtx.save();
                gameCtx.translate(this.x, this.y);
                gameCtx.rotate((this.angle * Math.PI) / 180);
                gameCtx.fillStyle = this.color;
                
                gameCtx.beginPath();
                gameCtx.moveTo(0, 0);
                gameCtx.bezierCurveTo(-this.size / 2, -this.size / 2, -this.size, this.size / 3, 0, this.size);
                gameCtx.bezierCurveTo(this.size, this.size / 3, this.size / 2, -this.size / 2, 0, 0);
                gameCtx.closePath();
                gameCtx.fill();
                gameCtx.restore();
            }
        }

        class CatchParticle {
            constructor(x, y) {
                this.x = x;
                this.y = y;
                this.vx = Math.random() * 4 - 2;
                this.vy = Math.random() * -3 - 2;
                this.size = Math.random() * 4 + 2;
                this.opacity = 1;
                this.fade = Math.random() * 0.03 + 0.02;
            }

            update() {
                this.x += this.vx;
                this.y += this.vy;
                this.opacity -= this.fade;
            }

            draw() {
                gameCtx.save();
                gameCtx.globalAlpha = this.opacity;
                gameCtx.shadowBlur = 8;
                gameCtx.shadowColor = 'rgba(251, 191, 36, 0.6)';
                gameCtx.fillStyle = Math.random() > 0.45 ? '#fbbf24' : '#ff758f'; // Warm gold & pink sparkles
                gameCtx.beginPath();
                gameCtx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                gameCtx.fill();
                gameCtx.restore();
            }
        }

        const spawnGameHeart = () => {
            if (!gameActive) return;
            fallingHearts.push(new FallingHeartItem());
            
            const nextSpawn = Math.random() * 800 + 600;
            heartSpawnInterval = setTimeout(spawnGameHeart, nextSpawn);
        };

        const updateGame = () => {
            if (!gameActive) return;

            gameCtx.clearRect(0, 0, gameCanvas.width, gameCanvas.height);
            basket.x += (basket.targetX - basket.x) * 0.35;

            gameCtx.fillStyle = '#ff85a1';
            gameCtx.beginPath();
            gameCtx.roundRect(basket.x, basket.y, basket.width, basket.height, 8);
            gameCtx.fill();
            
            gameCtx.fillStyle = '#ffb7c5';
            gameCtx.beginPath();
            gameCtx.roundRect(basket.x - 2, basket.y, basket.width + 4, 6, 3);
            gameCtx.fill();

            gameCtx.strokeStyle = 'rgba(255, 255, 255, 0.4)';
            gameCtx.lineWidth = 1;
            gameCtx.beginPath();
            for (let i = basket.x + 8; i < basket.x + basket.width; i += 10) {
                gameCtx.moveTo(i, basket.y + 6);
                gameCtx.lineTo(i - 4, basket.y + basket.height - 2);
            }
            gameCtx.stroke();

            for (let i = fallingHearts.length - 1; i >= 0; i--) {
                const heart = fallingHearts[i];
                heart.update();
                heart.draw();

                const hitBasketX = heart.x > basket.x && heart.x < basket.x + basket.width;
                const hitBasketY = heart.y + heart.size >= basket.y && heart.y < basket.y + basket.height;

                if (hitBasketX && hitBasketY) {
                    gameScore++;
                    if (scoreHUD) {
                        scoreHUD.innerText = gameScore;
                        gsap.fromTo(scoreHUD, 
                            { scale: 1.5, color: '#f43f5e' }, 
                            { scale: 1, color: '#ff85a1', duration: 0.35, ease: 'back.out(1.8)' }
                        );
                    }

                    for (let p = 0; p < 8; p++) {
                        particles.push(new CatchParticle(heart.x, heart.y));
                    }

                    fallingHearts.splice(i, 1);

                    if (gameScore >= 10) {
                        triggerGameWin();
                    }
                    continue;
                }

                if (heart.y > gameCanvas.height + 20) {
                    fallingHearts.splice(i, 1);
                }
            }

            for (let i = particles.length - 1; i >= 0; i--) {
                const p = particles[i];
                p.update();
                p.draw();
                if (p.opacity <= 0) {
                    particles.splice(i, 1);
                }
            }

            requestAnimationFrame(updateGame);
        };

        const startGame = () => {
            resizeGameCanvas();
            gameScore = 0;
            if (scoreHUD) scoreHUD.innerText = 0;
            fallingHearts = [];
            particles = [];
            gameActive = true;

            gsap.to(startScreen, {
                opacity: 0,
                duration: 0.35,
                onComplete: () => {
                    startScreen.classList.add('hidden');
                }
            });

            spawnGameHeart();
            updateGame();
        };

        const triggerGameWin = () => {
            gameActive = false;
            clearTimeout(heartSpawnInterval);

            confetti({
                particleCount: 50,
                spread: 60,
                origin: { y: 0.8 },
                colors: ['#ff85a1', '#ffb7c5', '#ff9fb2']
            });

            winScreen.classList.remove('hidden');
            gsap.fromTo(winScreen, 
                { y: gameCanvas.height, opacity: 0 }, 
                { y: 0, opacity: 1, duration: 0.6, ease: 'back.out(1.5)' }
            );
        };

        if (startBtn) startBtn.addEventListener('click', startGame);
    }

    // --------------------------------------------------------------------------
    // 13. DYNAMIC ANNIVERSARY COUNT-UP TIMER
    // --------------------------------------------------------------------------
    const anniversaryEl = document.getElementById('anniversary-date-picker');
    const timerDays = document.getElementById('timer-days');
    const timerHours = document.getElementById('timer-hours');
    const timerMinutes = document.getElementById('timer-minutes');
    const timerSeconds = document.getElementById('timer-seconds');

    if (anniversaryEl && timerDays) {
        const anniversaryDateStr = anniversaryEl.getAttribute('data-date');
        // Parse date accurately. If the string already has T time portion (e.g. 2023-10-17T01:58:00), parse directly.
        const anniversaryDate = anniversaryDateStr.includes('T') ? new Date(anniversaryDateStr) : new Date(anniversaryDateStr + 'T00:00:00');

        const updateTimer = () => {
            const now = new Date();
            const diffMs = now - anniversaryDate;

            if (diffMs < 0) {
                timerDays.innerText = '00';
                timerHours.innerText = '00';
                timerMinutes.innerText = '00';
                timerSeconds.innerText = '00';
                return;
            }

            const totalSeconds = Math.floor(diffMs / 1000);
            const totalMinutes = Math.floor(totalSeconds / 60);
            const totalHours = Math.floor(totalMinutes / 60);
            const days = Math.floor(totalHours / 24);

            const hours = totalHours % 24;
            const minutes = totalMinutes % 60;
            const seconds = totalSeconds % 60;

            timerDays.innerText = days.toString().padStart(2, '0');
            timerHours.innerText = hours.toString().padStart(2, '0');
            timerMinutes.innerText = minutes.toString().padStart(2, '0');
            timerSeconds.innerText = seconds.toString().padStart(2, '0');
        };

        setInterval(updateTimer, 1000);
        updateTimer();
    }

    // --------------------------------------------------------------------------
    // 13.5 INTERACTIVE 3D GIFT BOX UNWRAPPING
    // --------------------------------------------------------------------------
    const giftBox = document.getElementById('gift-box-wrapper');
    const voucherCard = document.getElementById('gift-voucher-card');
    const bowEl = document.getElementById('gift-box-bow');
    const lidEl = document.getElementById('gift-box-lid');
    const bodyEl = document.getElementById('gift-box-body');

    if (giftBox) {
        giftBox.addEventListener('click', () => {
            // GSAP Ribbon and Box Untie timeline
            const tl = gsap.timeline();

            // 1. Bow flies away
            tl.to(bowEl, {
                y: -60,
                opacity: 0,
                duration: 0.4,
                ease: 'power2.in'
            });

            // 2. Lid pops up and floats off
            tl.to(lidEl, {
                y: -100,
                rotate: -20,
                opacity: 0,
                duration: 0.7,
                ease: 'power3.inOut'
            }, '-=0.2');

            // 3. Front box bodies collapse
            tl.to(bodyEl, {
                scale: 0.1,
                opacity: 0,
                duration: 0.5,
                ease: 'power2.in',
                onComplete: () => {
                    giftBox.style.display = 'none'; // Hide wrapper
                }
            }, '-=0.4');

            // 4. Voucher Card slides upwards and glows!
            tl.fromTo(voucherCard,
                { opacity: 0, scale: 0.85, y: 80 },
                { 
                    opacity: 1, 
                    scale: 1, 
                    y: -25, 
                    pointerEvents: 'auto', 
                    duration: 1, 
                    ease: 'back.out(1.5)',
                    filter: 'drop-shadow(0 20px 45px rgba(245, 158, 11, 0.4))'
                }
            );

            // Confetti spray when gift opens!
            confetti({
                particleCount: 40,
                angle: 60,
                spread: 55,
                origin: { x: 0 },
                colors: ['#fbbf24', '#f59e0b', '#ffd1dc']
            });
            confetti({
                particleCount: 40,
                angle: 120,
                spread: 55,
                origin: { x: 1 },
                colors: ['#fbbf24', '#f59e0b', '#ffd1dc']
            });
        });
    }

    // --------------------------------------------------------------------------
    // 14. FLOATING MUSIC PLAYER & AUDIO CONTROLLER
    // --------------------------------------------------------------------------
    const audioToggleBtn = document.getElementById('btn-toggle-music');
    const playIcon = document.getElementById('icon-play');
    const pauseIcon = document.getElementById('icon-pause');
    const vinylDisc = document.getElementById('vinyl-disc');
    const visualizerBars = document.querySelectorAll('#audio-visualizer div');

    let visualizerInterval;

    const playMusic = () => {
        if (!audio) return;
        audio.play().then(() => {
            isMusicPlaying = true;
            playIcon.classList.add('hidden');
            pauseIcon.classList.remove('hidden');
            
            gsap.to(vinylDisc, {
                rotation: '+=360',
                duration: 6,
                repeat: -1,
                ease: 'none',
                overwrite: 'auto'
            });

            clearInterval(visualizerInterval);
            visualizerInterval = setInterval(() => {
                visualizerBars.forEach(bar => {
                    const h = Math.random() * 10 + 2;
                    gsap.to(bar, { height: h, duration: 0.15 });
                });
            }, 150);
        }).catch(err => {
            console.log('Audio autoplay blocked by client settings. Music will trigger on user action.');
        });
    };

    const pauseMusic = () => {
        if (!audio) return;
        audio.pause();
        isMusicPlaying = false;
        playIcon.classList.remove('hidden');
        pauseIcon.classList.add('hidden');

        gsap.killTweensOf(vinylDisc);

        clearInterval(visualizerInterval);
        visualizerBars.forEach(bar => {
            gsap.to(bar, { height: 4, duration: 0.2 });
        });
    };

    if (audioToggleBtn) {
        audioToggleBtn.addEventListener('click', () => {
            if (isMusicPlaying) {
                pauseMusic();
            } else {
                playMusic();
            }
        });
    }

    // --------------------------------------------------------------------------
    // 15. FINAL SECTION: STARRY STARFIELD & METEOR CANVASES
    // --------------------------------------------------------------------------
    const finalStarsCanvas = document.getElementById('final-stars-canvas');
    if (finalStarsCanvas) {
        const ctx = finalStarsCanvas.getContext('2d');
        let stars = [];
        let meteors = [];

        const resizeFinalCanvas = () => {
            finalStarsCanvas.width = window.innerWidth;
            finalStarsCanvas.height = window.innerHeight;
        };
        window.addEventListener('resize', resizeFinalCanvas);
        resizeFinalCanvas();

        class FinalStar {
            constructor() {
                this.x = Math.random() * finalStarsCanvas.width;
                this.y = Math.random() * finalStarsCanvas.height;
                this.size = Math.random() * 1.2 + 0.3;
                this.opacity = Math.random();
                this.speed = Math.random() * 0.008 + 0.003;
            }

            update() {
                this.opacity += this.speed;
                if (this.opacity > 1 || this.opacity < 0) {
                    this.speed = -this.speed;
                }
            }

            draw() {
                ctx.save();
                ctx.globalAlpha = this.opacity;
                ctx.fillStyle = '#ffffff';
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.fill();
                ctx.restore();
            }
        }

        class Meteor {
            constructor() {
                this.reset();
            }

            reset() {
                this.x = Math.random() * finalStarsCanvas.width * 1.5;
                this.y = -50;
                this.length = Math.random() * 80 + 50;
                this.speed = Math.random() * 8 + 4;
                this.thickness = Math.random() * 1.5 + 0.5;
                this.angle = 135;
                this.opacity = Math.random() * 0.7 + 0.3;
            }

            update() {
                const angleRad = (this.angle * Math.PI) / 180;
                this.x += Math.cos(angleRad) * this.speed;
                this.y -= Math.sin(angleRad) * this.speed;
                
                this.opacity -= 0.004;

                if (this.y > finalStarsCanvas.height + 100 || this.x < -100 || this.opacity <= 0) {
                    this.reset();
                }
            }

            draw() {
                ctx.save();
                ctx.globalAlpha = this.opacity;
                
                const grad = ctx.createLinearGradient(
                    this.x, this.y, 
                    this.x - Math.cos((this.angle * Math.PI) / 180) * this.length, 
                    this.y + Math.sin((this.angle * Math.PI) / 180) * this.length
                );
                grad.addColorStop(0, '#ffffff');
                grad.addColorStop(0.3, '#ffb7c5');
                grad.addColorStop(1, 'rgba(255, 183, 197, 0)');

                ctx.strokeStyle = grad;
                ctx.lineWidth = this.thickness;
                ctx.beginPath();
                ctx.moveTo(this.x, this.y);
                ctx.lineTo(
                    this.x - Math.cos((this.angle * Math.PI) / 180) * this.length, 
                    this.y + Math.sin((this.angle * Math.PI) / 180) * this.length
                );
                ctx.stroke();
                ctx.restore();
            }
        }

        for (let i = 0; i < 90; i++) {
            stars.push(new FinalStar());
        }

        for (let i = 0; i < 3; i++) {
            meteors.push(new Meteor());
        }

        let isFinalSectionVisible = false;
        const finalSectionEl = document.getElementById('final-section');
        if (finalSectionEl) {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    isFinalSectionVisible = entry.isIntersecting;
                });
            }, { threshold: 0.05 });
            observer.observe(finalSectionEl);
        }

        const animateFinalSky = () => {
            requestAnimationFrame(animateFinalSky);
            if (document.visibilityState === 'hidden' || !isFinalSectionVisible) return;

            ctx.clearRect(0, 0, finalStarsCanvas.width, finalStarsCanvas.height);
            stars.forEach(star => {
                star.update();
                star.draw();
            });
            meteors.forEach(met => {
                met.update();
                met.draw();
            });
        };
        animateFinalSky();
    }

    // --------------------------------------------------------------------------
    // 16. GRAND CLIMAX CELEBRATION (Click me one last time ❤️)
    // --------------------------------------------------------------------------
    const finalSurpriseBtn = document.getElementById('btn-final-surprise');
    const celebrationOverlay = document.getElementById('celebration-overlay');
    const resetSurpriseBtn = document.getElementById('btn-reset-surprise');

    if (finalSurpriseBtn && celebrationOverlay) {
        finalSurpriseBtn.addEventListener('click', () => {
            celebrationOverlay.classList.remove('hidden');
            celebrationOverlay.classList.add('flex');

            gsap.fromTo(celebrationOverlay,
                { opacity: 0 },
                { opacity: 1, duration: 0.8, ease: 'power2.out' }
            );

            gsap.fromTo('#celebration-cake-container',
                { scale: 0, rotation: -90 },
                { scale: 1, rotation: 0, duration: 1.2, ease: 'back.out(1.8)', delay: 0.3 }
            );

            // Re-inflate candle states if reset occurred
            isCandleLit = true;
            gsap.set('#cake-flame', { scale: 1, opacity: 1 });
            gsap.set('#cake-glow', { opacity: 1 });
            gsap.set('#cake-smoke', { opacity: 0, scale: 0.5 });

            gsap.fromTo('#celebration-banner-title',
                { scale: 0.7, opacity: 0 },
                { scale: 1, opacity: 1, duration: 1.4, ease: 'elastic.out(1, 0.5)', delay: 0.5 }
            );
            gsap.fromTo('#celebration-banner-name',
                { y: 30, opacity: 0 },
                { y: 0, opacity: 1, duration: 1, ease: 'power3.out', delay: 0.8 }
            );
            gsap.fromTo('#celebration-message',
                { opacity: 0 },
                { opacity: 1, duration: 1, delay: 1.2 }
            );
            gsap.fromTo('#btn-reset-surprise',
                { scale: 0.8, opacity: 0 },
                { scale: 1, opacity: 1, duration: 0.8, delay: 1.6, ease: 'back.out(1.5)' }
            );

            runConfettiCascade();
        });
    }

    // --------------------------------------------------------------------------
    // 16.5 INTERACTIVE CAKE CANDLE BLOWING SYSTEM
    // --------------------------------------------------------------------------
    let isCandleLit = true;
    const cakeContainer = document.getElementById('celebration-cake-container');
    const cakeFlame = document.getElementById('cake-flame');
    const cakeGlow = document.getElementById('cake-glow');
    const cakeSmoke = document.getElementById('cake-smoke');
    const cakeEl = document.getElementById('celebration-cake');

    if (cakeContainer) {
        cakeContainer.addEventListener('click', (e) => {
            // Prevent duplicate triggers if already extinguished
            if (!isCandleLit) return;
            isCandleLit = false;

            // Extinguish flame animation
            gsap.to(cakeFlame, { scale: 0, opacity: 0, duration: 0.3, ease: 'power2.in' });
            gsap.to(cakeGlow, { opacity: 0, duration: 0.3 });
            
            // Puff of smoke rise
            gsap.fromTo(cakeSmoke, 
                { opacity: 0, scale: 0.4, y: 15 },
                { opacity: 0.8, scale: 1.4, y: -30, duration: 0.9, ease: 'power1.out' }
            );

            // Jump/shock the cake
            gsap.fromTo(cakeEl,
                { y: 0 },
                { y: -35, duration: 0.45, yoyo: true, repeat: 1, ease: 'power2.out', onComplete: () => {
                    // Create floating wish card above cake
                    const wishBubble = document.createElement('div');
                    wishBubble.className = 'absolute top-[-30px] font-romantic text-xl font-bold text-pink-400 select-none animate-bounce z-40';
                    wishBubble.innerText = 'Wish made! ✨🕯️';
                    cakeContainer.appendChild(wishBubble);
                    setTimeout(() => wishBubble.remove(), 2500);

                    // Fade in and slide up Wish Board Card to invite input!
                    const wishCard = document.getElementById('wish-board-card');
                    if (wishCard) {
                        gsap.to(wishCard, {
                            opacity: 1,
                            y: 0,
                            duration: 0.8,
                            ease: 'back.out(1.5)',
                            pointerEvents: 'auto'
                        });
                    }
                }}
            );

            // Confetti spray boost!
            confetti({
                particleCount: 120,
                spread: 80,
                origin: { y: 0.6 },
                colors: ['#ff4d6d', '#ff758f', '#ffccd5', '#ffe5ec']
            });

            // Extra floating sparkles overlaying cake
            for (let i = 0; i < 8; i++) {
                setTimeout(() => {
                    const spark = document.createElement('div');
                    spark.className = 'absolute pointer-events-none text-xl animate-ping text-orange-400 select-none';
                    spark.innerHTML = '✨';
                    spark.style.left = Math.random() * 80 + 20 + 'px';
                    spark.style.top = Math.random() * 80 + 'px';
                    cakeContainer.appendChild(spark);
                    setTimeout(() => spark.remove(), 1000);
                }, i * 100);
            }
        });
    }

    if (resetSurpriseBtn && celebrationOverlay) {
        resetSurpriseBtn.addEventListener('click', () => {
            gsap.to(celebrationOverlay, {
                opacity: 0,
                duration: 0.6,
                ease: 'power2.in',
                onComplete: () => {
                    celebrationOverlay.classList.add('hidden');
                    celebrationOverlay.classList.remove('flex');
                    
                    window.scrollTo({ top: 0, behavior: 'smooth' });
                }
            });
        });
    }

    const runConfettiCascade = () => {
        const duration = isMobile ? 3500 : 7 * 1000; // Shorter cascade on mobile
        const animationEnd = Date.now() + duration;
        const defaults = { startVelocity: 25, spread: 360, ticks: 60, zIndex: 10002 };

        const randomInRange = (min, max) => Math.random() * (max - min) + min;
        const intervalTime = isMobile ? 450 : 250; // Slower tick interval on mobile

        const interval = setInterval(() => {
            const timeLeft = animationEnd - Date.now();

            if (timeLeft <= 0) {
                return clearInterval(interval);
            }

            // Lower density on mobile (max 20 instead of 50)
            const baseCount = isMobile ? 20 : 50;
            const particleCount = baseCount * (timeLeft / duration);
            
            confetti({ ...defaults, particleCount, origin: { x: randomInRange(0.1, 0.3), y: Math.random() - 0.2 } });
            confetti({ ...defaults, particleCount, origin: { x: randomInRange(0.7, 0.9), y: Math.random() - 0.2 } });
        }, intervalTime);
    };

    // --------------------------------------------------------------------------
    // 16.6 FLOATING LANTERNS "WISH UPON A STAR" CANVAS ENGINE
    // --------------------------------------------------------------------------
    const lampionCanvas = document.getElementById('celebration-confetti');
    if (lampionCanvas) {
        const lCtx = lampionCanvas.getContext('2d');
        let lampions = [];
        let specialLanterns = [];
        let activeMeteors = [];
        let lActive = false;
        
        const resizeLampionCanvas = () => {
            lampionCanvas.width = window.innerWidth;
            lampionCanvas.height = window.innerHeight;
        };
        window.addEventListener('resize', resizeLampionCanvas);
        resizeLampionCanvas();

        class Lampion {
            constructor(isSpecial = false, text = '') {
                this.isSpecial = isSpecial;
                this.text = text;
                this.reset();
                if (!isSpecial) {
                    // Spread initially
                    this.y = Math.random() * lampionCanvas.height;
                }
            }

            reset() {
                this.sizeW = this.isSpecial ? Math.random() * 20 + 35 : Math.random() * 12 + 18;
                this.sizeH = this.sizeW * 1.35;
                this.x = Math.random() * (lampionCanvas.width - this.sizeW * 2) + this.sizeW;
                this.y = lampionCanvas.height + this.sizeH + Math.random() * 50;
                this.speedY = this.isSpecial ? Math.random() * 0.4 + 0.55 : Math.random() * 0.3 + 0.35;
                this.swaySpeed = Math.random() * 0.015 + 0.005;
                this.swayWidth = Math.random() * 0.8 + 0.4;
                this.angle = Math.random() * Math.PI * 2;
                this.opacity = this.isSpecial ? 1.0 : Math.random() * 0.45 + 0.25;
                this.glowSize = this.isSpecial ? 30 : 15;
                
                // Warm glowing amber/rose gold colors
                this.colorLight = this.isSpecial ? '#fef08a' : '#fde047'; // bright yellow
                this.colorBody = 'rgba(249, 115, 22, 0.8)'; // orange
                this.colorBase = 'rgba(239, 68, 68, 0.9)'; // red-orange
            }

            update() {
                this.y -= this.speedY;
                this.angle += this.swaySpeed;
                this.x += Math.sin(this.angle) * this.swayWidth;
                
                // Special lantern decays opacity slowly near top
                if (this.isSpecial && this.y < lampionCanvas.height * 0.35) {
                    this.opacity -= 0.003;
                }

                if (this.y < -this.sizeH || (this.isSpecial && this.opacity <= 0)) {
                    if (this.isSpecial) {
                        // remove special lantern once it floats off or fades
                        return false;
                    }
                    this.reset();
                }
                return true;
            }

            draw() {
                lCtx.save();
                lCtx.globalAlpha = this.opacity;
                
                // Add soft amber neon glow bloom around lantern
                lCtx.shadowBlur = this.glowSize;
                lCtx.shadowColor = 'rgba(251, 146, 60, 0.7)'; // Warm orange glow
                
                // Draw Lantern silhouette (rounded top, tapered base)
                const startX = this.x - this.sizeW / 2;
                const startY = this.y - this.sizeH / 2;
                
                lCtx.beginPath();
                lCtx.moveTo(startX + this.sizeW * 0.15, this.y + this.sizeH / 2); // bottom-left
                lCtx.lineTo(startX, this.y - this.sizeH * 0.15); // middle-left
                // Top dome arc
                lCtx.bezierCurveTo(
                    startX, this.y - this.sizeH * 0.6,
                    startX + this.sizeW, this.y - this.sizeH * 0.6,
                    startX + this.sizeW, this.y - this.sizeH * 0.15
                );
                lCtx.lineTo(startX + this.sizeW * 0.85, this.y + this.sizeH / 2); // bottom-right
                lCtx.closePath();
                
                // Warm gradient fill (representing fire/paper)
                const grad = lCtx.createLinearGradient(this.x, this.y - this.sizeH/2, this.x, this.y + this.sizeH/2);
                grad.addColorStop(0, this.colorLight); // top fire core
                grad.addColorStop(0.5, this.colorBody); // middle amber
                grad.addColorStop(1, this.colorBase); // bottom red base
                lCtx.fillStyle = grad;
                lCtx.fill();
                
                // Draw little dark wooden bottom bar of lantern
                lCtx.shadowBlur = 0; // disable glow for dark stick
                lCtx.fillStyle = 'rgba(67, 20, 7, 0.8)';
                lCtx.beginPath();
                lCtx.roundRect(startX + this.sizeW * 0.1, this.y + this.sizeH / 2, this.sizeW * 0.8, this.sizeH * 0.08, 2);
                lCtx.fill();

                // Draw her special wish text right above/next to the lantern
                if (this.isSpecial && this.text) {
                    lCtx.shadowBlur = 10;
                    lCtx.shadowColor = '#000000';
                    lCtx.fillStyle = '#ffffff';
                    lCtx.font = 'italic bold 13px "Dancing Script", cursive, "Plus Jakarta Sans", sans-serif';
                    lCtx.textAlign = 'center';
                    lCtx.fillText(this.text, this.x, this.y - this.sizeH * 0.65);
                }
                
                lCtx.restore();
                return true;
            }
        }

        class LampionMeteor {
            constructor() {
                this.reset();
                this.opacity = 0; // starts dark
            }
            reset() {
                this.x = Math.random() * lampionCanvas.width * 1.3;
                this.y = -50;
                this.length = Math.random() * 90 + 60;
                this.speed = Math.random() * 10 + 6;
                this.thickness = Math.random() * 2 + 1;
                this.angle = 135;
                this.opacity = Math.random() * 0.8 + 0.2;
            }
            update() {
                const angleRad = (this.angle * Math.PI) / 180;
                this.x += Math.cos(angleRad) * this.speed;
                this.y -= Math.sin(angleRad) * this.speed;
                this.opacity -= 0.007;
                return this.opacity > 0 && this.y < lampionCanvas.height + 100 && this.x > -100;
            }
            draw() {
                lCtx.save();
                lCtx.globalAlpha = this.opacity;
                const grad = lCtx.createLinearGradient(
                    this.x, this.y, 
                    this.x - Math.cos((this.angle * Math.PI) / 180) * this.length, 
                    this.y + Math.sin((this.angle * Math.PI) / 180) * this.length
                );
                grad.addColorStop(0, '#ffffff');
                grad.addColorStop(0.3, '#fbcfe8'); // soft pink
                grad.addColorStop(1, 'rgba(251, 207, 232, 0)');
                lCtx.strokeStyle = grad;
                lCtx.lineWidth = this.thickness;
                lCtx.beginPath();
                lCtx.moveTo(this.x, this.y);
                lCtx.lineTo(
                    this.x - Math.cos((this.angle * Math.PI) / 180) * this.length, 
                    this.y + Math.sin((this.angle * Math.PI) / 180) * this.length
                );
                lCtx.stroke();
                lCtx.restore();
            }
        }

        const maxLampions = isMobile ? 12 : 28;
        
        const startLampionEngine = () => {
            lActive = true;
            lampions = [];
            specialLanterns = [];
            activeMeteors = [];
            for (let i = 0; i < maxLampions; i++) {
                lampions.push(new Lampion(false));
            }
            animateLampions();
        };

        const stopLampionEngine = () => {
            lActive = false;
        };

        const animateLampions = () => {
            if (!lActive) return;
            requestAnimationFrame(animateLampions);
            if (document.visibilityState === 'hidden') return;

            lCtx.clearRect(0, 0, lampionCanvas.width, lampionCanvas.height);
            
            // Draw background lampions
            lampions.forEach(lamp => {
                lamp.update();
                lamp.draw();
            });

            // Draw special lanterns containing wishes
            for (let i = specialLanterns.length - 1; i >= 0; i--) {
                const spec = specialLanterns[i];
                const keep = spec.update();
                if (keep) {
                    spec.draw();
                } else {
                    specialLanterns.splice(i, 1);
                }
            }

            // Draw shooting stars on wish send
            for (let i = activeMeteors.length - 1; i >= 0; i--) {
                const met = activeMeteors[i];
                const keep = met.update();
                if (keep) {
                    met.draw();
                } else {
                    activeMeteors.splice(i, 1);
                }
            }
        };

        // Wire start of engine into the surprise overlay display event
        if (finalSurpriseBtn) {
            finalSurpriseBtn.addEventListener('click', () => {
                resizeLampionCanvas();
                startLampionEngine();
                // Ensure the wish-board card starts hidden when entering
                const wishCard = document.getElementById('wish-board-card');
                if (wishCard) {
                    gsap.set(wishCard, { opacity: 0, y: 25 });
                }
            });
        }
        
        if (resetSurpriseBtn) {
            resetSurpriseBtn.addEventListener('click', stopLampionEngine);
        }

        // Handle sending the wish!
        const btnSendWish = document.getElementById('btn-send-wish');
        const wishInput = document.getElementById('wish-input');
        const wishBoardCard = document.getElementById('wish-board-card');
        
        if (btnSendWish && wishInput && wishBoardCard) {
            btnSendWish.addEventListener('click', () => {
                const text = wishInput.value.trim();
                if (!text) return;
                
                // Spawn her special text lantern!
                const wishLantern = new Lampion(true, text);
                // Position it near the bottom center where the wish board was
                wishLantern.x = lampionCanvas.width / 2;
                wishLantern.y = lampionCanvas.height - 100;
                wishLantern.speedY = 0.55; // Floats slightly faster
                specialLanterns.push(wishLantern);
                
                // Empty the input field
                wishInput.value = '';
                
                // Slide out the wish board card to reveal the gorgeous lantern sways!
                gsap.to(wishBoardCard, {
                    opacity: 0,
                    y: 40,
                    duration: 0.6,
                    ease: 'power2.in',
                    onComplete: () => {
                        // Allow resetting or overlay closure to happen peacefully
                    }
                });

                // Spawn a cascade of shooting stars to celebrate!
                for (let i = 0; i < 15; i++) {
                    setTimeout(() => {
                        activeMeteors.push(new LampionMeteor());
                    }, i * 120);
                }

                // Confetti mini shower on send
                confetti({
                    particleCount: 30,
                    spread: 45,
                    origin: { y: 0.8 },
                    colors: ['#fbbf24', '#f59e0b', '#fcd34d']
                });
            });
        }
    }
});
