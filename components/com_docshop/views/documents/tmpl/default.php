<?php
defined('_JEXEC') or die;

use Joomla\CMS\Language\Text;
use Joomla\CMS\Router\Route;

JHtml::_('bootstrap.framework');
JHtml::_('bootstrap.modal');

if (!function_exists('docshopExtractYoutubeEmbedUrl')) {
    function docshopExtractYoutubeEmbedUrl($url)
    {
        $url = trim((string) $url);

        if ($url === '') {
            return '';
        }

        $parts = parse_url($url);

        if (empty($parts['host'])) {
            return '';
        }

        $host = strtolower($parts['host']);
        $videoId = '';

        if (strpos($host, 'youtu.be') !== false) {
            $videoId = trim($parts['path'], '/');
        } elseif (strpos($host, 'youtube.com') !== false || strpos($host, 'youtube-nocookie.com') !== false) {
            if (!empty($parts['query'])) {
                parse_str($parts['query'], $query);
                if (!empty($query['v'])) {
                    $videoId = $query['v'];
                }
            }

            if ($videoId === '' && !empty($parts['path']) && preg_match('#/(embed|shorts)/([^/?]+)#', $parts['path'], $matches)) {
                $videoId = $matches[2];
            }
        }

        if ($videoId === '') {
            return '';
        }

        return 'https://www.youtube.com/embed/' . rawurlencode($videoId) . '?rel=0';
    }
}
?>

<div class="com-docshop-documents">
    <h1><?php echo Text::_('COM_DOCSHOP_DOCUMENTS'); ?></h1>

    <?php if (count($this->items) > 0) : ?>
        <div class="documents-list">
            <?php foreach ($this->items as $item) : ?>
                <div class="document-card">
                    <h3><?php echo htmlspecialchars($item->title); ?></h3>
                    <p><?php echo htmlspecialchars(substr($item->description, 0, 150)); ?>...</p>
                    <div class="document-meta">
                        <span class="price">$<?php echo number_format($item->price, 2); ?></span>
                        <span class="size"><?php echo number_format($item->file_size / 1024, 2); ?> KB</span>
                    </div>
                    <div class="document-actions">
                        <a href="#paypalModal<?php echo (int) $item->id; ?>" class="btn btn-primary" data-toggle="modal">
                            <?php echo Text::_('COM_DOCSHOP_DOWNLOAD_NOW'); ?>
                        </a>
                        <?php if (!empty($item->youtube_url)) : ?>
                            <a href="#guideModal<?php echo (int) $item->id; ?>" class="btn btn-secondary" data-toggle="modal">
                                <?php echo Text::_('COM_DOCSHOP_YOUTUBE_GUIDE'); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

                <div id="paypalModal<?php echo (int) $item->id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                        <h3><?php echo Text::_('COM_DOCSHOP_PAYMENT_POPUP_TITLE'); ?></h3>
                    </div>
                    <div class="modal-body">
                        <h4><?php echo htmlspecialchars($item->title); ?></h4>
                        <p><?php echo Text::_('COM_DOCSHOP_PAYMENT_POPUP_DESC'); ?></p>
                        <p><?php echo htmlspecialchars(substr($item->description, 0, 200)); ?></p>
                        <p><strong><?php echo Text::_('COM_DOCSHOP_PRICE'); ?>:</strong> $<?php echo number_format($item->price, 2); ?></p>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo Text::_('COM_DOCSHOP_BACK'); ?></button>
                        <form method="post" action="<?php echo Route::_('index.php?option=com_docshop&task=checkout.processPayment'); ?>" style="display:inline-block;margin:0;">
                            <input type="hidden" name="document_id" value="<?php echo (int) $item->id; ?>" />
                            <?php echo JHtml::_('form.token'); ?>
                            <button type="submit" class="btn btn-primary"><?php echo Text::_('COM_DOCSHOP_PROCEED_PAYPAL'); ?></button>
                        </form>
                    </div>
                </div>

                <?php if (!empty($item->youtube_url)) : ?>
                    <?php $embedUrl = docshopExtractYoutubeEmbedUrl($item->youtube_url); ?>
                    <div id="guideModal<?php echo (int) $item->id; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                            <h3><?php echo Text::_('COM_DOCSHOP_GUIDE_VIDEO'); ?></h3>
                        </div>
                        <div class="modal-body">
                            <h4><?php echo htmlspecialchars($item->title); ?></h4>
                            <?php if ($embedUrl) : ?>
                                <div style="position:relative;padding-bottom:56.25%;height:0;overflow:hidden;">
                                    <iframe
                                        src="<?php echo htmlspecialchars($embedUrl); ?>"
                                        title="<?php echo htmlspecialchars($item->title); ?>"
                                        style="position:absolute;top:0;left:0;width:100%;height:100%;border:0;"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                        allowfullscreen
                                    ></iframe>
                                </div>
                            <?php else : ?>
                                <p><?php echo Text::_('COM_DOCSHOP_NO_GUIDE_AVAILABLE'); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo Text::_('COM_DOCSHOP_BACK'); ?></button>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>

        <?php if ($this->pagination->total > $this->pagination->limit) : ?>
            <div class="pagination">
                <?php echo $this->pagination->getListFooter(); ?>
            </div>
        <?php endif; ?>
    <?php else : ?>
        <p><?php echo Text::_('COM_DOCSHOP_NO_DOCUMENTS'); ?></p>
    <?php endif; ?>
</div>
