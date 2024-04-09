<?php get_header(); ?>

    <main id="primary" class="site-main">
        <section class="max-w-5xl mx-auto flex flex-col lg:flex-row items-center lg:gap-x-10 my-20">
            <div class="lg:basis-2/4">
                <?php
                    $title = get_field('titre_de_ma_section');
                    $description = get_field('description_section');
                    // Comment vérifier le contenu de ma variable
//                    die(var_dump($title));
                ?>
                <h1 class="lg:w-3/4 mb-5">
                    <?= !empty($title) ? $title : 'ko' ?>

                    <?php
                    // Autre exemple
//                        if(!empty($title)) {
//                            echo $title;
//                        } else {
//                            echo 'ko';
//                        }
                    ?>
                </h1>
                <p>
                    <?php // Troisième méthode pour appeler les variables ?>
                    <?php if(!empty($description)) : ?>
                        <?= $description ?>
                    <?php else : ?>
                        Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                        totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                        dicta sunt explicabo.
                    <?php endif; ?>
                </p>
            </div>
            <div class="lg:basis-2/4">
                <?php
                    // Comment récupérer une image
                    $imageId = get_field('image_de_ma_section');
                    if(!empty($imageId) && is_int($imageId)){
                        echo wp_get_attachment_image($imageId, 'full', false, ['class' => 'w-full']);
                    }

                ?>
<!--                <img src="--><?php //= get_stylesheet_directory_uri() ?><!--/assets/img/001_illustration.png" alt="Hero image">-->
            </div>
        </section>
        <section class="bg-background py-20">
            <?php
                $cards = get_field('cards');
//                die(var_dump($cards));
            ?>
            <div class="mb-10 text-center">
                <h2>Why our clients chosse Ensome?</h2>
                <p class="max-w-md mx-auto">
                    Doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                    architecto beatae vitae dicta sunt explicabo.
                </p>
            </div>
            <div class="max-w-5xl mx-auto grid lg:grid-cols-3 gap-4">
                <div class="bg-white rounded-2xl drop-shadow-customcard px-8 py-10">
                    <div class="inline-block border border-background rounded-xl p-3 mb-4">
                        <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/01_icon_brain_circuit.png"
                             class="w-8 h-8 object-contain" width="42" height="42" alt="Illustration">
                    </div>
                    <h3>Machine learning</h3>
                    <p>
                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                        deleniti atque corrupti quos dolores.
                    </p>
                </div>
                <div class="bg-white rounded-2xl drop-shadow-customcard px-8 py-10">
                    <div class="inline-block border border-background rounded-xl p-3 mb-4">
                        <img src="<?= get_stylesheet_directory_uri() ?>/assets/img/02_icon_arrow_trending_lines.png"
                             class="w-8 h-8 object-contain" width="42" height="42" alt="Illustration">
                    </div>
                    <h3>Embed analytics</h3>
                    <p>
                        At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum
                        deleniti atque corrupti quos dolores.
                    </p>
                </div>
            </div>
        </section>

        <section class="testimonials max-w-5xl mx-auto py-20">
            <div class="flex flex-col lg:flex-row justify-between mb-20">
                <h2 class="lg:w-1/4 mb-0">Trusted by the best in the business</h2>
                <div class="flex h-fit">
                    <button class="relative bg-background mr-4 text-white px-6 py-4 rounded-lg swiper-button-prev">
                        <img class="w-4 object-contain rotate-180"
                             src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow-right.png"
                             alt="Next testimonial">
                    </button>
                    <button class="relative bg-background text-gray px-6 py-4 rounded-lg swiper-button-next">
                        <img class="w-4 object-contain"
                             src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/arrow-right.png"
                             alt="Next testimonial">
                    </button>
                </div>
            </div>
            <div x-data="Testimonials" class="overflow-x-clip">

                <div class="swiper-wrapper">
                    <div class="swiper-slide relative bg-white drop-shadow-customcard rounded-2xl p-8 pt-12">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/001_img_person_1.png"
                             class="absolute -top-7 left-7 w-14 h-14 object-cover rounded-full">
                        <p class="mb-4">
                            “Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                            nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea
                            voluptate velit esse quam nihil molestiae consequatur, vel illum.”
                        </p>

                        <div>
                            <span class="text-base block font-medium leading-none">Alex Bern</span>
                            <span class="text-gray text-sm">CEO, Company</span>
                        </div>

                    </div>
                    <div class="swiper-slide relative bg-white drop-shadow-customcard rounded-2xl p-8 pt-12">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/001_img_person_1.png"
                             class="absolute -top-7 left-7 w-14 h-14 object-cover rounded-full">
                        <p class="mb-4">
                            “Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                            nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea
                            voluptate velit esse quam nihil molestiae consequatur, vel illum.”
                        </p>

                        <div>
                            <span class="text-base block font-medium leading-none">Alex Bern</span>
                            <span class="text-gray text-sm">CEO, Company</span>
                        </div>

                    </div>
                    <div class="swiper-slide relative bg-white drop-shadow-customcard rounded-2xl p-8 pt-12">
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/001_img_person_1.png"
                             class="absolute -top-7 left-7 w-14 h-14 object-cover rounded-full">
                        <p class="mb-4">
                            “Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam,
                            nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea
                            voluptate velit esse quam nihil molestiae consequatur, vel illum.”
                        </p>

                        <div>
                            <span class="text-base block font-medium leading-none">Alex Bern</span>
                            <span class="text-gray text-sm">CEO, Company</span>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="bg-primary py-10 text-white">
            <div class="max-w-5xl mx-auto grid lg:grid-cols-4 gap-4 lg:divide-x divide-background/25">
                <div class="text-center flex flex-col">
                    <span class="text-5xl font-bold mb-2">1830+</span>
                    <span class="text-sm">Project executed</span>
                </div>
                <div class="text-center flex flex-col lg:pl-4">
                    <span class="text-5xl font-bold mb-2">220</span>
                    <span class="text-sm">Data analytics</span>
                </div>
                <div class="text-center flex flex-col lg:pl-4">
                    <span class="text-5xl font-bold mb-2">390</span>
                    <span class="text-sm">Data management</span>
                </div>
                <div class="text-center flex flex-col lg:pl-4">
                    <span class="text-5xl font-bold mb-2">834+</span>
                    <span class="text-sm">Satisfied customers</span>
                </div>
            </div>
        </section>

        <section class="bg-background py-20">
            <div class="max-w-5xl mx-auto flex flex-col lg:flex-row items-stretch justify-between gap-6">
                <div class="lg:py-6 lg:basis-2/5">
                    <h2 class="leading-10 font-medium">Left questions? Contacts us now for a free consultation and free trial!</h2>
                    <p class="mb-12">
                        Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut
                        aliquid ex ea commodi.
                    </p>
                    <div>
                        <div class="mb-4">
                            <span class="block text-sm text-gray">Email address</span>
                            <span class="font-semibold text-sm">ensome@info.co.us</span>
                        </div>
                        <div class="mb-4">
                            <span class="block text-sm text-gray">Phone number</span>
                            <a href="tel:0600000000" class="font-semibold text-sm">+1601-201-5580</a>
                        </div>
                        <div class="mb-4">
                            <span class="block text-sm text-gray">Address</span>
                            <span class="font-semibold text-sm">1642 Washington Avenue, Jackson, MS, Mississippi, 39201</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white rounded-2xl lg:basis-2/5 px-6 py-8">
                    <h2 class="text-center">Contact Us</h2>
                </div>
            </div>
        </section>
    </main><!-- #main -->

<?php
get_footer();
