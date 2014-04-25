<link rel="stylesheet" href="<?=x::theme_url()?>/css/content.css">
<?
		$banners = array();
		for ( $i = 1; $i <= 5 ; $i++) { 
			if ( file_exists( x::path_file( "banner$i" ) ) ) {
				$banners[] = array(
					'src' => x::url_file( "banner$i" ),
					'href' => x::meta( "banner{$i}_url" ),
					'subject' => x::meta("banner{$i}_subject"),
					'content' => x::meta("banner{$i}_content")
				);
			} 
		}
		$total_banners = count($banners);		
	?>	
	
		<div class='banner-container'>
				<?
				if( $total_banners ){	
					$fake_last_image = $banners[count($banners)-1]['src'];
					if( $banners[$total_banners-1]['subject'] ) $fake_last_image_subject = $banners[$total_banners-1]['subject'];
					else $fake_last_image_subject = "No Subject";
					if( $banners[$total_banners-1]['content'] ) $fake_last_image_content = $banners[$total_banners-1]['content'];
					else $fake_last_image_content = "No Content";
					$fake_first_image = $banners[0]['src'];
					if( $banners[0]['subject'] ) $fake_first_image_subject = $banners[0]['subject'];
					else $fake_first_image_subject = "No Subject";
					if( $banners[0]['content'] ) $fake_first_image_content = $banners[0]['content'];
					else $fake_first_image_content = "No Content";
				}
				else{
					$no_banner = "no_banner";
				}
				?>							
			<div class='inner'>			
				<div class='banner <?=$no_banner?>'>
				<?if( $total_banners ){ ?>
					<div class='banner_holder'>
						<img src='<?=$fake_last_image?>'/>
						<div class='text_content'>
							<div class = 'banner_subject'><?=cut_str($fake_last_image_subject,40,'...')?></div>
							<div class = 'banner_content'><?=cut_str($fake_last_image_content,100,'...')?></div>
						</div>						
					</div>
					<? 				
					$count = 1;
					foreach ( $banners as $banner ) {																
						if( $banner['subject'] ) $banner_subject = cut_str($banner['subject'],40,'...');
						else $banner_subject = "No Subject";
						if( $banner['content'] ) $banner_content = cut_str($banner['content'],100,'...');
						else $banner_content = "No Content";
						
						if ( !$url = $banner['href'] ) {
							$url = "javascript:void(0);";
							$target = "";
						}
						else {
							$target = "target='_blank'";
						}
						
						?>
						<div class='banner_holder'>
							<a href='<?=$url?>' <?=$target?>>
								<img banner_num = <?=$count?> src='<?=$banner['src']?>'/>
							</a>
							<div class='text_content'>
								<div class = 'banner_subject'>
									<a href='<?=$url?>' <?=$target?>>
										<?=$banner_subject?>
									</a>
								</div>
								<div class = 'banner_content'>
								
									<a href='<?=$url?>' <?=$target?>>
										<?=$banner_content?>
									</a>
								</div>
							</div>	
						</div>
					<?
					$count++;
					}
					?>
					<div class='banner_holder'>
						<img src='<?=$fake_first_image?>'/>
						<div class='text_content'>						
							<div class = 'banner_subject'><?=cut_str($fake_first_image_subject,40,'...')?></div>
							<div class = 'banner_content'><?=cut_str($fake_first_image_content,100,'...')?></div>
						</div>	
					</div>
				<?} else {
					if( admin() ) $site_management_text = "<a href='".url_site_config()."' >사이트 관리</a>";
					else $site_management_text = "사이트 관리";
				?>				
					<div class='banner_holder'>
						<img src='<?=x::url_theme()?>/img/no_image_banner1.png'/>
						<div class='text_content'>						
							<div class = 'banner_subject'>업로드한 배너 이미지가 없습니다.</div>
							<div class = 'banner_content'><?=$site_management_text?> 를 클릭하여 배너를 등록해 주세요.</div>
						</div>	
					</div>
				<?}?>
				</div>
				<?if( $total_banners ){ ?>
					<div class='commands'>
						<div class='left_btn button'><img src = '<?=x::url_theme()?>/img/left_btn.png'/></div>
						<div class='button'>
							<img class='stop_btn stop_and_play' src = '<?=x::url_theme()?>/img/stop_btn.png'/>
							<img class='play_btn stop_and_play'src = '<?=x::url_theme()?>/img/play_btn.png'/>
						</div>
						<div class='right_btn button'><img src = '<?=x::url_theme()?>/img/right_btn.png'/></div>
						<div style='clear:both'></div>
					</div>
				<?}?>
			</div><!--/inner-->
		</div><!--banner-container-->
		<?if( $total_banners ){ ?>
			<div class='lower_commands'>
				<?for( $i = 1; $i <= $total_banners; $i++ ){?>
					<div class='bullet' banner_num='<?=$i?>'>
						<img class='off' src = '<?=x::url_theme()?>/img/change_banner_bottom.png'/>					
						<img class='on' src = '<?=x::url_theme()?>/img/change_banner_bottom_selected.png'/>					
					</div>
				<?}?>
			</div>
		<?}?>
		<div class='gallery-top'>
			<div class='gallery-top-left'>
				<div class='inner'>
					<?
						include widget(
							array(
								'code'		=> 'x-latest-gallery3-gallery-top-left',
								'name'		=> 'x-latest-gallery3-gallery-top-left',
								'default_forum_id' => bo_table(1),
								'git'		=> 'https://github.com/x-widget/x-latest-gallery3-gallery-top-left',
							)
						);
					?>
				</div>
			</div>
			<div class='gallery-top-right'>
				<div class='inner'>
					<?
						include widget(
							array(
								'code'		=> 'x-latest-gallery3-gallery-top-right',
								'name'		=> 'x-latest-gallery3-gallery-top-right',
								'default_forum_id' => bo_table(2),
								'git'		=> 'https://github.com/x-widget/x-latest-gallery3-gallery-top-right',
							)
						);
					?>
				</div>
			</div>
			<div style="clear: both"></div>
		</div>
		<div class='gallery-bottom'>
			<?
				include widget(
					array(
						'code'	 	=> 'x-latest-gallery3-gallery-bottom',
						'name'		=> 'x-latest-gallery3-gallery-bottom',
						'default_forum_id'	=> bo_table(3),
						'git' 		=> 'https://github.com/x-widget/x-latest-gallery3-gallery-bottom',
					)
				);
			?>
			</div>
		</div>
<?if ( preg_match('/msie 7/i', $_SERVER['HTTP_USER_AGENT'] ) ) {?>
<style>		
	.banner-container .banner_holder{
		display:inline;
		padding-right:4px;
	}
	
	.banner-container .commands .button{
		width:30px;
		float:left;
	}
</style>
<?}?>
