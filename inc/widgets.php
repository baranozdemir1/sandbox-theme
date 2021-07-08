<?php

// Adds widget: Sandbox Popular Posts
class Sandbox_Popular_Posts_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'sandbox_popular_posts_widget',
            esc_html__( 'Sandbox Popular Posts', 'sandbox' )
        );
    }

    private $widget_fields = array(
        array(
            'label' => 'Number of posts to show',
            'id' => 'number_of_posts_to_number',
            'default' => '3',
            'type' => 'number',
        ),
        array(
            'label' => 'Display post date?',
            'id' => 'display_post_date_checkbox',
            'type' => 'checkbox',
        ),
        array(
            'label' => 'Display comment count?',
            'id' => 'display_comment_count_checkbox',
            'type' => 'checkbox',
        ),
    );

    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        // Output generated fields

        // Custom WP query widget_query
        $args_widget_query = array(
            'order' => 'DESC',
            'posts_per_page' => $instance['number_of_posts_to_number'],
        );

        $widget_query = new WP_Query( $args_widget_query );

        if ( $widget_query->have_posts() ) {
            ?>

            <ul class="image-list">
            <?php
            while ( $widget_query->have_posts() ) {
                $widget_query->the_post();
                ?>

                <li>
                    <figure class="rounded">
                        <?php sandbox_post_thumbnail(); ?>
                    </figure>
                    <div class="post-content">
                        <h6 class="mb-2"> <a class="link-dark" href="<?php the_permalink(); ?>"><?php the_title() ?></a> </h6>
                        <ul class="post-meta">
                            <?php if ( $instance['display_post_date_checkbox'] ): ?>
                                <li class="post-date"><?php sandbox_posted_on(); ?></li>
                            <?php endif; ?>
                            <?php if ( $instance['display_comment_count_checkbox'] ): ?>
                                <li class="post-comments">
                                    <a href="<?php echo get_comments_pagenum_link() ?>">
                                        <i class="uil uil-comment"></i> <?php echo get_comments_number() ?>
                                    </a>
                                </li>
                            <?php endif; ?>

                        </ul>
                        <!-- /.post-meta -->
                    </div>
                </li>

                <?php
            }
            ?>
            </ul>
            <!-- /.image-list -->
            <?php
        } else {

        }

        wp_reset_postdata();

        echo $args['after_widget'];
    }

    public function field_generator( $instance ) {
        $output = '';
        foreach ( $this->widget_fields as $widget_field ) {
            $default = '';
            if ( isset($widget_field['default']) ) {
                $default = $widget_field['default'];
            }
            $widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'sandbox' );
            switch ( $widget_field['type'] ) {
                case 'checkbox':
                    $output .= '<p>';
                    $output .= '<input class="checkbox" type="checkbox" '.checked( $widget_value, true, false ).' id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" value="1">';
                    $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'sandbox' ).'</label>';
                    $output .= '</p>';
                    break;
                default:
                    $output .= '<p>';
                    $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'sandbox' ).':</label> ';
                    $output .= '<input class="tiny-text" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'sandbox' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'sandbox' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
        $this->field_generator( $instance );
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        foreach ( $this->widget_fields as $widget_field ) {
            switch ( $widget_field['type'] ) {
                default:
                    $instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
            }
        }
        return $instance;
    }
}

// Adds widget: Sandbox Categories
class Sandbox_Categories_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'sandbox_categories_widget',
            esc_html__( 'Sandbox Categories', 'sandbox' )
        );
    }

    private $widget_fields = array(
        array(
            'label' => 'Show post counts',
            'id' => 'show_post_counts_checkbox',
            'type' => 'checkbox',
        )
    );

    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        // Output generated fields

        ?>
        <ul class="unordered-list bullet-primary text-reset">
            <?php
            $categories = get_terms( 'category', array(
                'orderby'    => 'count',
                'hide_empty' => 0,
            ) );

            if ( ! empty( $categories ) && ! is_wp_error( $categories ) ){
                foreach ( $categories as $category ) {
                    $count = $instance['show_post_counts_checkbox'] ? '(' . $category->count . ')' : '';
                    ?>
                    <li><a href="<?php echo get_category_link( $category->term_id ) ?>"><?php echo $category->name; echo ' ' . $count; ?></a></li>
                    <?php
                }
            }
            ?>
        </ul>
        <?php

        echo $args['after_widget'];
    }

    public function field_generator( $instance ) {
        $output = '';
        foreach ( $this->widget_fields as $widget_field ) {
            $default = '';
            if ( isset($widget_field['default']) ) {
                $default = $widget_field['default'];
            }
            $widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'sandbox' );
            switch ( $widget_field['type'] ) {
                case 'checkbox':
                    $output .= '<p>';
                    $output .= '<input class="checkbox" type="checkbox" '.checked( $widget_value, true, false ).' id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" value="1">';
                    $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'sandbox' ).'</label>';
                    $output .= '</p>';
                    break;
                default:
                    $output .= '<p>';
                    $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'sandbox' ).':</label> ';
                    $output .= '<input class="tiny-text" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'sandbox' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'sandbox' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
        $this->field_generator( $instance );
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        foreach ( $this->widget_fields as $widget_field ) {
            switch ( $widget_field['type'] ) {
                default:
                    $instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
            }
        }
        return $instance;
    }
}

// Adds widget: Sandbox Tags
class Sandbox_Tags_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'sandbox_tags_widget',
            esc_html__( 'Sandbox Tags', 'sandbox' )
        );
    }

    private $widget_fields = array();

    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        // Output generated fields
        $tags = get_tags();
        if ( $tags ) {
            ?>
            <ul class="list-unstyled tag-list">
            <?php
            foreach ( $tags as $tag ) { ?>

                <li><a href="<?php echo esc_url( get_tag_link( $tag->term_id ) ); ?>" title="<?php echo esc_attr( $tag->name ); ?>" class="btn btn-soft-ash btn-sm rounded-pill"><?php echo esc_html( $tag->name ); ?></a></li>

            <?php }
            ?>
            </ul>
            <?php
        }

        echo $args['after_widget'];
    }

    public function field_generator( $instance ) {
        $output = '';
        foreach ( $this->widget_fields as $widget_field ) {
            $default = '';
            if ( isset($widget_field['default']) ) {
                $default = $widget_field['default'];
            }
            $widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'sandbox' );
            switch ( $widget_field['type'] ) {
                default:
                    $output .= '<p>';
                    $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'sandbox' ).':</label> ';
                    $output .= '<input class="tiny-text" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'sandbox' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'sandbox' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
        $this->field_generator( $instance );
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        foreach ( $this->widget_fields as $widget_field ) {
            switch ( $widget_field['type'] ) {
                default:
                    $instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
            }
        }
        return $instance;
    }
}

// Adds widget: Sandbox Archives
class Sandbox_Archives_Widget extends WP_Widget {

    function __construct() {
        parent::__construct(
            'sandbox_archives_widget',
            esc_html__( 'Sandbox Archives', 'sandbox' )
        );
    }

    private $widget_fields = array();

    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        if ( ! empty( $instance['title'] ) ) {
            echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }

        // Output generated fields
        ?>
        <ul class="unordered-list bullet-primary text-reset">
            <?php echo wp_get_archives() ?>
        </ul>
        <?php

        echo $args['after_widget'];
    }

    public function field_generator( $instance ) {
        $output = '';
        foreach ( $this->widget_fields as $widget_field ) {
            $default = '';
            if ( isset($widget_field['default']) ) {
                $default = $widget_field['default'];
            }
            $widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'sandbox' );
            switch ( $widget_field['type'] ) {
                default:
                    $output .= '<p>';
                    $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'sandbox' ).':</label> ';
                    $output .= '<input class="tiny-text" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
                    $output .= '</p>';
            }
        }
        echo $output;
    }

    public function form( $instance ) {
        $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( '', 'sandbox' );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'sandbox' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
        </p>
        <?php
        $this->field_generator( $instance );
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        foreach ( $this->widget_fields as $widget_field ) {
            switch ( $widget_field['type'] ) {
                default:
                    $instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
            }
        }
        return $instance;
    }
}

function register_sandbox_widgets() {
    register_widget( 'Sandbox_Popular_Posts_Widget' );
    register_widget( 'Sandbox_Categories_Widget' );
    register_widget( 'Sandbox_Tags_Widget' );
    register_widget( 'Sandbox_Archives_Widget' );
}
add_action( 'widgets_init', 'register_sandbox_widgets' );