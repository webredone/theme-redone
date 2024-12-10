<section
    class="more-blog-posts"
    aria-label="Latest Blog Posts Section"
>
    <div class="container">
        <h2 class="text-center mb40">
            Latest Blog Posts
        </h2>
        <div class="f-row row--3 mb40">
            @php
            $customPosts = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => 3,
                'orderby' => 'DESC',
            ]);
            @endphp

            @if($customPosts->have_posts())
                @while($customPosts->have_posts())
                    @php $customPosts->the_post(); @endphp
                    @include('components.post-card')
                @endwhile
                @php wp_reset_postdata(); @endphp
            @endif
        </div><!-- end row -->
        <div class="text-center">
            <a
                href="{{ esc_url(home_url('/')) }}blog"
                class="btn btn--brand"
            >
                <span>Go to Blog</span>
            </a>
        </div>
    </div>
</section>
