<?php
get_header(2);
while (have_posts()) :
    the_post();
?>
    <main class="main">

        <div class="breadcrumb">
            <div class="container">
                <div class="wrapper-container">
                    <?php
                    /**
                     * MONA GET LAYOUT - BREADCRUMB
                     */
                    get_template_part('patch/breadcrumb');
                    ?>
                </div>
            </div>

        </div>

        <section class="sec-new-detail">
            <div class="container">
                <div class="wrapper-container"> 
                      
                            <div class="content-new-detail " data-aos="fade-right">
                                
                                <h1 class="txt-title txt-40"><?php the_title(); ?></h1>
                               
                                <div class="wrapper-content mona-content">
                                    <?php the_content(); ?>
                                </div>
                                 
                            </div> 
                  
                </div>
            </div>
        </section>

    </main>
<?php
endwhile;
get_footer();
?>