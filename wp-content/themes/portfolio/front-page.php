<?php /* Template Name: Page "Home page" */ ?>
<?php get_header(); ?>

<section class="header">
    <div class="header_elm">
        <h1>SEREN COBAN</h1>
        <p>Web developer</p>
    </div>
</section>

<section class="about_me">
    <h2 class="hidden">About me</h2>
    <p>Welcome to my world where aesthetics and functionality come together...</p>
    <a class="btn" href="<?php echo get_permalink( get_page_by_path('about') ); ?>">About me</a>
</section>

<section class="flower-stem-section">
    <div class="flower">
        <img src="resources/img/flower.png" alt="">
    </div>

    <div class="stem">
        <svg xmlns="http://www.w3.org/2000/svg" width="157" height="975" viewBox="0 0 157 975" fill="none">
            <path d="M75 2.5C49.4997 24.5 13.5 83 3.49998 196.5C-8.58821 333.701 159.5 407 154.5 496C160 594.5 14 648.5 5.5 745.5C-3.78223 851.426 44.5002 940 84.0002 973" stroke="#898962" stroke-width="4"/>
        </svg>
    </div>

    <div class="flower-stem-container">
        <div class="growth-step">
            <div class="petal">
                <svg xmlns="http://www.w3.org/2000/svg" width="198" height="188" viewBox="0 0 198 188" fill="none">
                    <path d="M25.5933 85.0014C33.7786 121.015 69.6033 143.551 105.61 135.337L177.465 118.945V118.945C169.279 82.9315 133.455 60.3957 97.4478 68.6097L25.5933 85.0014V85.0014Z" fill="#898962"/>
                    <path d="M51 96.5891C71.1995 104.57 90.4998 90.7775 113.908 91.6359C149.914 92.9563 162.832 96.4876 178.043 118.422" stroke="#EAE8C6" stroke-width="2"/>
                </svg>
            </div>
            <div class="project-content">
                <div class="overlay">
                    <p class="overlay-text">Projet un</p>
                </div>
            </div>
        </div>

        <div class="growth-step">
            <div class="petal">
                <svg xmlns="http://www.w3.org/2000/svg" width="198" height="188" viewBox="0 0 198 188" fill="none">
                    <path d="M24.5684 87.8953C34.0796 123.581 70.7131 144.777 106.392 135.237L177.591 116.2V116.2C168.08 80.5139 131.446 59.3182 95.7676 68.8579L24.5684 87.8953V87.8953Z" fill="#898962"/>
                    <path d="M50.3861 98.5356C70.8668 105.764 89.644 91.2675 113.068 91.2598C149.098 91.2479 162.138 94.2992 178.15 115.656" stroke="#EAE8C6" stroke-width="2"/>
                </svg>
            </div>
            <div class="project-content">
                <div class="overlay">
                    <p class="overlay-text">Projet deux</p>
                </div>
            </div>

        </div>

        <div class="growth-step">
            <div class="petal">
                <svg xmlns="http://www.w3.org/2000/svg" width="198" height="188" viewBox="0 0 198 188" fill="none">
                    <path d="M27.0508 80.4899C33.2465 116.898 67.78 141.367 104.183 135.142L176.829 122.72V122.72C170.634 86.3115 136.1 61.8429 99.6968 68.0677L27.0508 80.4899V80.4899Z" fill="#898962"/>
                    <path d="M51.7828 93.4548C71.5137 102.532 91.5421 89.8206 114.868 91.9629C150.747 95.258 163.452 99.4932 177.436 122.229" stroke="#EAE8C6" stroke-width="2"/>
                </svg>
            </div>
            <div class="project-content">
                <div class="overlay">
                    <p class="overlay-text">Projet trois</p>
                </div>
            </div>

        </div>
    </div>
    <div class="see-more">
        <a class="btn" href="#">See More</a>
    </div>

</section>


<?php get_footer(); ?>
