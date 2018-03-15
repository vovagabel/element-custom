<?php
namespace ElementorPro\Modules\Posts\Skins;

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Class Skin Custom
 */
class Skin_Custom extends Skin_Base {

	public function get_id() {
		return 'custom';
	}

	public function get_title() {
		return __( 'Custom', 'elementor-custom' );
	}

	protected function register_title_controls() {
		parent::register_title_controls();
		$this->add_control(
			'title_link',
			[
				'label' => __( 'Title Link', 'elementor-custom' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'On', 'elementor-custom' ),
				'label_off' => __( 'Off', 'elementor-custom' ),
				'return_value' => 'yes',
				'default' => 'yes',
				'condition' => [
					$this->get_control_id( 'show_title' ) => 'yes',
				],
			]
		);
	}

	protected function register_excerpt_controls() {
		$this->add_control(
			'show_text',
			[
				'label' => __( 'Text', 'elementor-custom' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => __( 'Show', 'elementor-custom' ),
				'label_off' => __( 'Hide', 'elementor-custom' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);

		$this->add_control(
			'show_excerpt',
			[
				'label' => __( 'Text Type', 'elementor-custom' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'excerpt' => 'Excerpt',
					'content' => 'Content',
				],
				'default' => 'excerpt',
				'condition' => [
					$this->get_control_id( 'show_text' ) => 'yes',
				],
			]
		);

		$this->add_control(
			'excerpt_length',
			[
				'label' => __( 'Excerpt Length', 'elementor-custom' ),
				'type' => Controls_Manager::NUMBER,
				'default' => apply_filters( 'excerpt_length', 25 ),
				'condition' => [
					$this->get_control_id( 'show_text' ) => 'yes',
					$this->get_control_id( 'show_excerpt' ) => 'excerpt',
				],
			]
		);
	}

	protected function render_title() {
		if ( ! $this->get_instance_value( 'show_title' ) ) {
			return;
		}

		$tag = $this->get_instance_value( 'title_tag' );
		?>
		<<?php echo $tag; ?> class="elementor-post__title">
			<?php if ( $this->get_instance_value( 'title_link' ) ) { ?>
				<a href="<?php echo get_permalink(); ?>">
			<?php } ?>
				<?php the_title(); ?>
			<?php if ( $this->get_instance_value( 'title_link' ) ) { ?>
				</a>
			<?php } ?>
		</<?php echo $tag; ?>>
		<?php
	}

	protected function render_excerpt() {
		if ( ! $this->get_instance_value( 'show_text' ) ) {
			return;
		}
		?>
		<div class="elementor-post__excerpt">
			<?php if ( $this->get_instance_value( 'show_excerpt' ) === 'excerpt' ) {
				the_excerpt();
			} else {
				the_content();
			} ?>
		</div>
		<?php
	}

	public function render_amp() {

	}
}