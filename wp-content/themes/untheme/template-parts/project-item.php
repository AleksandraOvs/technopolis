<article <?php post_class('project'); ?> itemscope itemtype="http://schema.org/CreativeWork">
    <div class="project-thumbnail">
        <figure>
            <a href="<?php the_permalink(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('large', ['class' => 'project-image', 'loading' => 'lazy']); ?>
                <?php else : ?>
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/placeholder.svg" alt="Изображение отсутствует" class="project-image placeholder" loading="lazy">
                <?php endif; ?>
            </a>
        </figure>
        <div class="project-category">
            <?php echo get_the_term_list(get_the_ID(), 'category'); ?>
        </div>
    </div>
    <div class="project-content">
        <ul class="object-info">
            <?php
            if ($obj_name = carbon_get_post_meta(get_the_ID(), 'crb_object_name')) {
                echo '<li><span>Объект:</span><p>' . $obj_name . '</p></li>';
            }
            ?>

            <?php
            if ($obj_works = carbon_get_post_meta(get_the_ID(), 'crb_object_works')) {
                echo '<li><span>Виды работ:</span><p>' . $obj_works . '</p></li>';
            }
            ?>
        </ul>
        <div class="project-link">

            <svg width="60" height="60" viewBox="0 0 60 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="1" y="1" width="58" height="58" rx="29" stroke="#5667CA" stroke-width="2" />
                <path d="M38.7044 22.6932L22.3775 19.7059C22.0853 19.6525 21.8541 19.5114 21.684 19.2828C21.515 19.0533 21.4613 18.7731 21.5229 18.442C21.5862 18.1186 21.7285 17.8778 21.9498 17.7197C22.1707 17.5637 22.4468 17.5154 22.7782 17.575L41.0293 20.9144C41.2923 20.9635 41.5108 21.0469 41.6847 21.1646C41.8586 21.2823 42.0118 21.437 42.1442 21.6287C42.2767 21.8205 42.3671 22.0185 42.4156 22.2228C42.464 22.4271 42.4643 22.6604 42.4163 22.9225L39.0782 41.1754C39.0269 41.4556 38.8864 41.6838 38.6567 41.8599C38.4257 42.0369 38.1472 42.0982 37.8211 42.0437C37.4909 41.9832 37.2477 41.84 37.0916 41.6139C36.9346 41.3866 36.8863 41.1079 36.9467 40.7777L39.9325 24.4675L19.3718 38.6681C19.1185 38.843 18.8488 38.9043 18.5626 38.8519C18.2764 38.7996 18.0459 38.6468 17.8709 38.3934C17.696 38.1401 17.6347 37.8704 17.687 37.5842C17.7394 37.298 17.8922 37.0675 18.1455 36.8925L38.7044 22.6932Z" fill="#5667CA" />
            </svg>

        </div>
    </div>

</article>