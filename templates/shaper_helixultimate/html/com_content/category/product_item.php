<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_content
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Create a shortcut for params.
$params = $this->item->params;
JHtml::addIncludePath(JPATH_COMPONENT . '/helpers/html');
$canEdit = $this->item->params->get('access-edit');
$info    = $params->get('info_block_position', 0);

// Check if associations are implemented. If they are, define the parameter.
$assocParam = (JLanguageAssociations::isEnabled() && $params->get('show_associations'));

?>

<?php 
if ($params->get('access-view')) :
	$link = JRoute::_(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language));
else :
	$menu = JFactory::getApplication()->getMenu();
	$active = $menu->getActive();
	$itemId = $active->id;
	$link = new JUri(JRoute::_('index.php?option=com_users&view=login&Itemid=' . $itemId, false));
	$link->setVar('return', base64_encode(ContentHelperRoute::getArticleRoute($this->item->slug, $this->item->catid, $this->item->language)));
endif; 

$images = json_decode($this->item->images);
$image_intro = trim($images->image_intro);

JLoader::register('FieldsHelper', JPATH_ADMINISTRATOR . '/components/com_fields/helpers/fields.php');
$fields = FieldsHelper::getFields('com_content.article', $this->item, true);
$customField = array();
foreach ($fields as $field){
    $customField[$field->name] = $field->value;
}
 ?>
<div class="has-hover">
	<div class="box-image">
		<div class="image-none">
			<a href="<?php echo $link?>" class="shawBox shadow">                      
				<img src="<?php echo $image_intro; ?>" alt="<?php echo $this->item->title?>"/>
			</a>
		</div>	
	</div>
	<div class="box-text box-text-products">
		<div class="title"><a href="<?php echo $link?>" class="product-title"> <?php echo $this->item->title?></a></div>
		
		<div class="price-wrapper">
			<span class="price">MS0001</span>
		</div>	
		<div class="box-bottom row">
			<div class="col medium-6 small-12 large-6">
				<a class="btn-readmore" href="<?php echo $link?>">
					Chi tiết
				</a>
			</div>
			<div class="col medium-6 small-12 large-6">
				<a class="btn-lien-he" href="https://www.honda.com.sg/" target="_blank">
						Xem thực tế
				</a>
			</div>
		</div>
	</div>
</div>