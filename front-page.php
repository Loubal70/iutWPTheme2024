<?php get_header(); ?>

    <main id="primary" class="site-main">
        <section class="max-w-5xl mx-auto flex flex-col lg:flex-row items-center lg:gap-x-10 my-20">
            <div class="lg:basis-2/4">
                <?php
                    $title = get_field('frontpage_title');
                ?>
                <h1 class="lg:w-3/4 mb-5">
                    <!-- Comment écrire un titre -->
                    <?php //Commentaire PHP ?>
                    <?= !empty($title) ? $title : 'Test' ?>

                    <?php
//                        if(!empty($title)){
//                            echo $title;
//                        } else {
//                            echo "Test";
//                        }
                    ?>
                </h1>
                <p>
                    Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium,
                    totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae
                    dicta sunt explicabo.
                </p>
            </div>
            <div class="lg:basis-2/4">
                <?php
                    $image = get_field('frontpage_image');
                    // Comment vérifier l'id de mon image
                    // die(var_dump($image));
                    echo wp_get_attachment_image($image, 'full', false, ['class' => 'image-100']);
                ?>
            </div>
        </section>
        <section class="bg-background py-20">
            <?php
                $services = get_field('cards');
                //die(print_r($services));
            ?>
            <div class="mb-10 text-center">
                <h2>Why our clients chosse Ensome?</h2>
                <p class="max-w-md mx-auto">
                    Doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                    architecto beatae vitae dicta sunt explicabo.
                </p>
            </div>
            <div class="max-w-5xl mx-auto grid lg:grid-cols-3 gap-4">
                <?php foreach($services as $value): //die(var_dump($value)); ?>
                    <div class="bg-white rounded-2xl drop-shadow-customcard px-8 py-10">
                    <div class="inline-block border border-background rounded-xl p-3 mb-4">
<!--                        <img src="--><?php //= get_stylesheet_directory_uri() ?><!--/assets/img/01_icon_brain_circuit.png"-->
<!--                             class="w-8 h-8 object-contain" width="42" height="42" alt="Illustration">-->
                        <?php
                            echo wp_get_attachment_image($value['image'], 'full', false, ['class' => 'image-100']);
                        ?>
                    </div>
                    <h3><?php echo $value['title']; ?></h3>
                    <p><?php echo $value['description'] ?></p>
                </div>
                <?php endforeach; ?>
            </div>
        </section>

        <?php
        $query = new WP_Query([
            'post_type' => 'testimonial',
            'posts_per_page' => 3,
            'order' => 'DESC',
            'orderby' => 'date',
            'tax_query' => array(
                // Première possibilité : Je recherche les témoignages qui ont un type égal à "test"
                array (
                    'taxonomy' => 'type',
                    'field' => 'slug',
                    'terms' => ['test', 'test1'],
                ),
                // Deuxième possibilité : Je recherche les témoignages qui n'ont pas de type
//                    array (
//                        'taxonomy' => 'type',
//                        'operator' => 'NOT EXISTS'
//                    )
            ),
        ]);

        // Voir si j'ai des résultats
        //            die(var_dump($query->posts));

        ?>

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
                    <?php foreach ($query->posts as $testimony): //var_dump($testimony);
                        $profession = get_field('profession', $testimony->ID);
                    ?>
                        <div class="swiper-slide relative bg-white drop-shadow-customcard rounded-2xl p-8 pt-12">
<!--                            <img src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/assets/img/001_img_person_1.png"-->
<!--                                 class="absolute -top-7 left-7 w-14 h-14 object-cover rounded-full">-->
                            <?php
                                if(has_post_thumbnail($testimony->ID)){
                                    echo get_the_post_thumbnail($testimony->ID, 'full', ['class' => 'image-100']);
                                }
                            ?>
                            <p class="mb-4">
                                <?php echo wp_trim_words($testimony->post_content, 55, '...'); ?>
                            </p>

                            <div>
                                <span class="text-base block font-medium leading-none">
                                    <?php echo $testimony->post_title; ?>
                                </span>
                                <?php if(!empty($profession)): ?>
                                    <span class="text-gray text-sm">
                                        <?php echo $profession; ?>
                                    </span>
                                <?php endif; ?>
                            </div>

                        </div>
                    <?php endforeach; ?>
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
