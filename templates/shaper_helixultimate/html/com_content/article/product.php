<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Create shortcuts to some parameters.
$params  = $this->item->params;
$images  = json_decode($this->item->images);
$urls    = json_decode($this->item->urls);
$canEdit = $params->get('access-edit');
$user    = JFactory::getUser();
$info    = $params->get('info_block_position', 0);

JLoader::register('FieldsHelper', JPATH_ADMINISTRATOR . '/components/com_fields/helpers/fields.php');
$fields = FieldsHelper::getFields('com_content.article', $this->item, true);
$customField = array();
foreach ($fields as $field){
    $customField[$field->name] = $field->value;
}


$tmpl_params = JFactory::getApplication()->getTemplate(true)->params;

$relatedArticles = [];
if (file_exists($helix_path) && $tmpl_params->get('related_article')) {
	require_once($helix_path);
	$args['catId'] =  $this->item->catid;
	$args['maximum'] = $tmpl_params->get('related_article_limit');
	$args['itemTags'] = $this->item->tags->itemTags;
	$args['item_id'] = $this->item->id;
	$relatedArticles = HelixUltimate::getRelatedArticles($args);
}
?>
<div class="productDetail">
	<div class="introtext">
		<div class="row">
			<div class="col-md-6">   

				<div class="product-images relative mb-half has-hover woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images" data-columns="4" style="opacity: 1;">
  <div class="badge-container is-larger absolute left top z-1"></div>
  <div class="image-tools absolute top show-on-hover right z-3"></div>
  <div class="woocommerce-product-gallery__wrapper product-gallery-slider slider slider-nav-small mb-half flickity-enabled" data-flickity-options="{
                &quot;cellAlign&quot;: &quot;center&quot;,
                &quot;wrapAround&quot;: true,
                &quot;autoPlay&quot;: false,
                &quot;prevNextButtons&quot;:true,
                &quot;adaptiveHeight&quot;: true,
                &quot;imagesLoaded&quot;: true,
                &quot;lazyLoad&quot;: 1,
                &quot;dragThreshold&quot; : 15,
                &quot;pageDots&quot;: false,
                &quot;rightToLeft&quot;: false       }" tabindex="0">
      <div class="flickity-viewport" style="height: 670px; touch-action: pan-y;"><div class="flickity-slider" style="left: 0px; transform: translateX(0%);">
		<img src="<?php echo htmlspecialchars($images->image_fulltext); ?>" alt="<?php echo $this->escape($this->item->title); ?>" />
	</div>
  	<div class="image-tools absolute bottom left z-3">
    	<a role="button" href="#product-zoom" class="zoom-button button is-outline circle icon tooltip hide-for-small tooltipstered" aria-label="Phóng to" data-flatsome-role-button="attached"><i class="icon-expand" aria-hidden="true"></i></a>  
	</div>
</div>

			</div>
			<div class="col-md-6">  
				<?php if ($params->get('show_title')) : ?>
					<h2 itemprop="headline">
						<?php echo $this->escape($this->item->title); ?>
					</h2>
				<?php endif; ?>
				<?php
				if( ($tmpl_params->get('social_share') || $params->get('show_vote')) && !$this->print) : ?>
					<div class="article-ratings-social-share d-flex justify-content-end">
						<div class="mr-auto align-self-center">
							<?php if($params->get('show_vote')): ?>
								<?php JHtml::_('jquery.token'); ?>
								<?php echo JLayoutHelper::render('joomla.content.rating', array('item' => $this->item, 'params' => $params)) ?>
							<?php endif; ?>
						</div>
						<div>
							<?php echo JLayoutHelper::render('joomla.content.social_share', $this->item); ?>
						</div>
					</div>
				<?php endif; ?>		
				<div class="product-short-description">
					<ul class="features-list">
						<li><i class="fa fa-check-circle"></i> Dễ dàng Cài đặt giống Demo nhanh</li>
						<li><i class="fa fa-code"></i> Theme lý tưởng cho thương mại điện tử</li>
						<li><i class="fa fa-desktop"></i> Giao diện hiện đại, thu hút khách hàng</li>
						<li><i class="fa fa-search"></i> Tốc độ tải nhanh, trải nghiệm tốt</li>
						<li><i class="fa fa-shopping-cart"></i> Quản lý sản phẩm và đơn hàng dễ dàng</li>
						<li><i class="fa fa-box"></i> Dữ liệu đầy đủ: media, plugins, theme</li>
						<li><i class="fa fa-mobile-alt"></i> Tương thích mọi thiết bị máy tính và di động</li>
						<li><i class="fa fa-shield-alt"></i> Code chuẩn SEO, an toàn, bảo mật</li>
						<li><i class="fa fa-cogs"></i> Tùy biến nội dung dễ dàng</li>
						<li><i class="fa fa-info-circle"></i> Phiên bản cập nhật mới nhất</li>
					</ul>						
				</div>
				
			</div>
			
		</div>
	</div>
	<div class="fulltext">
		<h3>Chi Tiết</h3>
		<?php echo $this->item->introtext; ?>      
	</div>

	<?php if($tmpl_params->get('related_article') && count($relatedArticles) > 0 ): ?>
	<?php echo \JLayoutHelper::render('joomla.content.related_articles', ['articles'=>$relatedArticles, 'item'=>$this->item]);  ?>
	<?php endif; ?>
</div>