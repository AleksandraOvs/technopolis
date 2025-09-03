document.addEventListener("DOMContentLoaded", () => {

    if (window.innerWidth > 1024) {
        const parents = document.querySelectorAll('.menu-item-has-children');

        parents.forEach(parent => {
            const link = parent.querySelector('a');
            const submenu = parent.querySelector('.dropdown-menu');

            if (!link || !submenu) return;

            // Показываем меню при наведении мыши
            parent.addEventListener('mouseenter', () => {
                submenu.style.display = 'grid';
            });

            parent.addEventListener('mouseleave', () => {
                submenu.style.display = 'none';
            });

            // Переход по ссылке по клику
            link.addEventListener('click', (e) => {
                console.log(`переход по ссылке: ${link.textContent.trim()}`);
                // переход по ссылке произойдёт по умолчанию
            });
        });
    }

    // else {
    //     const parents = document.querySelectorAll('.menu-item-has-children');

    //     parents.forEach(parent => {
    //         const link = parent.querySelector('a');
    //         const submenu = parent.querySelector('.dropdown-menu');

    //         if (!link || !submenu) return;

    //         // Скрываем подменю изначально
    //         submenu.style.display = 'none';

    //         link.addEventListener('click', (e) => {
    //             // если у ссылки есть подменю — блокируем переход
    //             if (submenu) {
    //                 e.preventDefault();

    //                 // Закрываем все открытые подменю
    //                 document.querySelectorAll('.menu-item-has-children .dropdown-menu')
    //                     .forEach(menu => {
    //                         if (menu !== submenu) {
    //                             menu.style.display = 'none';
    //                         }
    //                     });

    //                 // Переключаем текущее
    //                 submenu.style.display = submenu.style.display === 'grid' ? 'none' : 'grid';
    //             }
    //         });
    //     });
    // }

    if (window.innerWidth >= 1240) {
        let navItemLength = document.querySelectorAll('nav .main-menu li').length;
        let ourLogo = document.querySelector('.container .header__inner__logo');

        let menuItems = document.querySelectorAll('nav .main-menu li:nth-child(' + Math.floor(navItemLength / 2 + 1) + ')');

        for (var i = 0; i < menuItems.length; i++) {
            menuItems[i].after(ourLogo);
        }
    }

    $(".page-section__title h2").html(function () {

        var text = $(this).text().trim().split(" ");
        var first = text.shift();
        return (text.length >= 0 ? "<span class='first-word'>" + first + "</span> " : first) + text.join(" ");

    });

    // Изменение хедера при скролле

    if (window.innerWidth >= 1024) {
        const headerFront = document.querySelector('.site-header');
        const headerChange = () => {
            const
                mainBlock = document.querySelector('body');


            window.addEventListener('scroll', () => {
                if (-mainBlock.getBoundingClientRect().top > 100) {
                    headerFront.classList.add('header-scroll');

                } else {
                    headerFront.classList.remove('header-scroll');
                }
            })

        }
        headerChange();
    }
    //плавный скролл

    function smoothScrollToElement(selector, duration = 700) {
        const target = document.querySelector(selector);
        if (!target) return;

        // Отключаем встроенный smooth scroll на время анимации
        document.documentElement.style.scrollBehavior = "auto";

        const element = document.scrollingElement || document.documentElement;
        const start = element.scrollTop;
        const targetTop = target.getBoundingClientRect().top + start - 160;
        const change = targetTop - start;
        const startTime = performance.now();

        function easeInOutQuad(t) {
            return t < 0.5
                ? 2 * t * t
                : -1 + (4 - 2 * t) * t;
        }

        function animateScroll(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easedProgress = easeInOutQuad(progress);

            element.scrollTop = start + change * easedProgress;

            if (elapsed < duration) {
                requestAnimationFrame(animateScroll);
            } else {
                // Возвращаем поведение браузера обратно
                document.documentElement.style.scrollBehavior = "";
            }
        }

        requestAnimationFrame(animateScroll);
    }

    //  плавный скролл по клику на ссылку
    document.querySelectorAll('a[href^="#"]').forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault(); // убираем мгновенный прыжок
            smoothScrollToElement(this.getAttribute("href"), 800);
        });
    });

    // кнопка вверх
    const upArrow = document.querySelector('.arrow-up');


    function arrowUp() {

        if (upArrow) {
            upArrow.addEventListener('click', (e) => {
                e.preventDefault();
                smoothScrollToTop(800);
            });
        }

        // const arrow = document.querySelector('.arrow-up');
        if (!upArrow) return; // если кнопка не найдена — выходим

        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                upArrow.classList.add('show');
            } else {
                upArrow.classList.remove('show');
            }
        });
    }

    arrowUp();

    // Универсальный плавный скролл к верху
    function smoothScrollToTop(duration = 700) {
        const element = document.scrollingElement || document.documentElement;
        const start = element.scrollTop;
        const change = -start;
        const startTime = performance.now();

        function easeInOutQuad(t) {
            return t < 0.5
                ? 2 * t * t
                : -1 + (4 - 2 * t) * t;
        }

        function animateScroll(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const easedProgress = easeInOutQuad(progress);

            element.scrollTop = start + change * easedProgress;

            if (elapsed < duration) {
                requestAnimationFrame(animateScroll);
            }
        }

        requestAnimationFrame(animateScroll);
    }
    //анимация при скролле

    function onEntry(entry) {
        entry.forEach(change => {
            if (change.isIntersecting) {
                change.target.classList.add('animate');
            }
        });
    }
    let options = { threshold: [0.5] };
    let observer = new IntersectionObserver(onEntry, options);
    let elements = document.querySelectorAll('.fromTop, .toRight, .toleft, .fromBottom, .fromOpacity');
    for (let elm of elements) {
        observer.observe(elm);
    };



    if (window.innerWidth > 1200) {
        window.addEventListener('load', () => {
            const textBlocks = document.querySelectorAll('.services-list__item');
            const targetBlocks = document.querySelectorAll('.section-services__inner__right__text');

            textBlocks.forEach((textBlock, index) => {
                const targetBlock = targetBlocks[index];
                if (targetBlock) {
                    const height = textBlock.offsetHeight;
                    targetBlock.style.height = `${height}px`;
                }
            });
        });
    }

    let body = $('body');
    let menu = $('.header-bottom');
    let burger = $('.menu-toggle');
    //let textOther = 'Закрыть';

    $(document).on('click', '.menu-toggle', function (e) {
        e.stopPropagation(); // Остановить всплытие
        $(this).toggleClass('open');
        menu.toggleClass('open');
        body.toggleClass('_fixed');
    });
});




document.addEventListener('DOMContentLoaded', function () {
    // Берём именно список с пунктами меню внутри футера
    const footerMenu = document.querySelector('.footer-widget li .menu-uslugi-container ul.menu');
    if (!footerMenu) {
        console.warn('Футерное меню не найдено');
        return;
    }

    // Ищем все пункты с подменю
    const menuItems = footerMenu.querySelectorAll('.menu-item-has-children');
    console.log('Найдено пунктов с подменю:', menuItems.length);

    menuItems.forEach(function (item) {
        // Берём ссылку верхнего уровня
        const link = item.firstElementChild; // первый элемент внутри li — <a>
        const submenu = item.querySelector('.sub-menu');

        if (!link || !submenu) return;

        link.addEventListener('click', function (e) {
            if (submenu.classList.contains('open')) {
                // Второй клик — идём по ссылке
                return;
            }

            // Первый клик — отменяем переход и открываем подменю
            e.preventDefault();
            submenu.classList.add('open');
        });
    });

    //стилизация номера телефона в футере

    // const phoneLink = document.querySelector('.phone a');
    // let phoneText = phoneLink.textContent;

    // phoneText = phoneText.replace(/-/g, '');

    // const firstPart = phoneText.slice(0, phoneText.length - 7);
    // const lastSeven = phoneText.slice(-7);

    // phoneLink.innerHTML = `${firstPart}<span class="highlight-last-seven">${lastSeven}</span>`;
});

