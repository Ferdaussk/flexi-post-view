<?php


#################---#######111 Save or register settings start
	//***************---****** Settings start  (Tab)
	//------ General Settings Controls start
	register_setting( // Check Sale
		'flpvi-group',
		'flpvi-breadcrumb-check-gallery'
	);
	register_setting( // Check stock
		'flpvi-group',
		'flpvi-stock-check-gallery'
	);
	register_setting( // Check Sale
		'flpvi-group',
		'flpvi-sale-check-gallery'
	);
	register_setting( // Check featured
		'flpvi-group',
		'flpvi-featured-check-gallery'
	);
	register_setting( // Check featured
		'flpvi-group',
		'flpvi-featured-img-check-gallery'
	);
	register_setting( // Check gallery
		'flpvi-group',
		'flpvi-gallery-img-check-gallery'
	);
	register_setting( // Check Title
		'flpvi-group',
		'flpvi-title-check-gallery'
	);
	register_setting( // Reviews count check
		'flpvi-group',
		'flpvi-revcntch-check-gallery'
	);
	register_setting( // Check post price
		'flpvi-group',
		'flpvi-reg-price-check-gallery'
	);
	register_setting( // Check short description
		'flpvi-group',
		'flpvi-short-description-check-gallery'
	);
	register_setting( // Check categories
		'flpvi-group',
		'flpvi-categories-check-gallery'
	);
	register_setting( // Check tags
		'flpvi-group',
		'flpvi-tags-check-gallery'
	);
	register_setting( // Check quantity
		'flpvi-group',
		'flpvi-sku-check-gallery'
	);
	register_setting( // Check add to cart
		'flpvi-group',
		'flpvi-actions-check-gallery'
	);
	register_setting( // Check description
		'flpvi-group',
		'flpvi-description-check-gallery'
	);

	// Related Posts General Settings Controls start
	register_setting( // Check related posts
		'flpvi-group',
		'flpvi-related-posts-check-gallery'
	);
	register_setting( // related posts top title
		'flpvi-group',
		'flpvi-relpro-toptile-check-gallery'
	);
	register_setting( // related posts image
		'flpvi-group',
		'flpvi-relpro-prodimg-check-gallery'
	);
	register_setting( // related posts img link
		'flpvi-group',
		'flpvi-relpro-imglnk-check-gallery'
	);
	register_setting( // related posts title
		'flpvi-group',
		'flpvi-relpro-prodtitle-check-gallery'
	);
	register_setting( // related posts title link
		'flpvi-group',
		'flpvi-relpro-titlelnk-check-gallery'
	);
	register_setting( // related posts price
		'flpvi-group',
		'flpvi-relpro-prodpric-check-gallery'
	);
	register_setting( // related posts button
		'flpvi-group',
		'flpvi-relpro-button-check-gallery'
	);
	register_setting( // related posts count
		'flpvi-group',
		'flpvi-relpro-count-gallery'
	);
	register_setting( // related exclud post
		'flpvi-group',
		'flpvi-relpro-excdpro-gallery'
	);
	register_setting( // related posts desc
		'flpvi-group',
		'flpvi-relpro-dsc-check-gallery'
	);
	register_setting( // related posts word length
		'flpvi-group',
		'flpvi-relpro-dscwordl-gallery'
	);
	register_setting( // related posts desc indi
		'flpvi-group',
		'flpvi-relpro-dscind-gallery'
	);
	// Related Posts General Settings Controls end
	//------ General Settings Controls end

	//------ Archive Settings start
	register_setting( // Use our style?
		'flpvi-group',
		'flpvi-enable-post-single-page'
	);
	register_setting( // Choose Preset
		'flpvi-group',
		'flpvi-select-preset-single-post'
	);
	//------ Archive Settings end
	//***************---****** Settings end  (Tab)

	//***************---****** Save Style start  (Tab)
	//------ General style save start
	register_setting(
		'flpvi-group',
		'flpvi-general-style-fsize'
	);
	register_setting(
		'flpvi-group',
		'flpvi-general-title-clr'
	);
	register_setting(
		'flpvi-group',
		'flpvi-btn-hover-bgc'
	);
	register_setting(
		'flpvi-group',
		'flpvi-button-color'
	);
	register_setting(
		'flpvi-group',
		'flpvi-btn-ps'
	);
	register_setting(
		'flpvi-group',
		'flpvi-btn-margin'
	);
	register_setting(
		'flpvi-group',
		'flpvi-btn-btype'
	);
	register_setting(
		'flpvi-group',
		'flpvi-btn-bs'
	);
	register_setting(
		'flpvi-group',
		'flpvi-btn-bors'
	);
	register_setting(
		'flpvi-group',
		'flpvi-btn-bc'
	);
	register_setting(
		'flpvi-group',
		'flpvi-btn-iconc'
	);
	//------ General style save end

	//------ Breadcrumb style save start
	register_setting(
		'flpvi-group',
		'flpvi-breadalign'
	);
	register_setting(
		'flpvi-group',
		'flpvi-text-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-crnttext-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-text-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-breadcrumb-size-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-breadcrumb-padding-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-breadcrumb-margin-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-fontfamilly'
	);
	// Breadcrumb hover save
	register_setting(
		'flpvi-group',
		'flpvi-breadcrumb-hover-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-breadcrumb-hover-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-breadcrumb-hover-size-control'
	);
	//------ Breadcrumb style save end

	//------ Stock or Not style save start
	register_setting(
		'flpvi-group',
		'flpvi-stockornotalign'
	);
	register_setting(
		'flpvi-group',
		'flpvi-stockornot-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-stockornot-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-stockornot-size-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-stockornot-padding-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-stockornot-margin-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-stockornot-fontfamilly-control'
	);
	// Stock or Not hover save
	register_setting(
		'flpvi-group',
		'flpvi-stockornot-hover-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-stockornot-hover-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-stockornot-hover-size-control'
	);
	//------ Stock or Not style save end

	//------ Sale Note style save start
	register_setting(
		'flpvi-group',
		'flpvi-salenotealign'
	);
	register_setting(
		'flpvi-group',
		'flpvi-salenote-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-salenote-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-salenote-size-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-stockornot-padding-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-salenote-margin-control'
	);
	// Sale Note hover save
	register_setting(
		'flpvi-group',
		'flpvi-salenote-hover-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-salenote-hover-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-salenote-hover-size-control'
	);
  //------ Sale Note style save end

	//------ Featured img style save start
	register_setting(
		'flpvi-group',
		'flpvi-fetuimg-align'
	);
	register_setting(
		'flpvi-group',
		'flpvi-fetuimg-border-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-fetuimg-border-clr-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-fetuimg-brdrtype-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-fetuimg-bdrrds-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-fetuimg-padding-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-fetuimg-margin-control'
	);
	//------ Featured img style save end

	//------ Gallery imgs style save start
	register_setting(
		'flpvi-group',
		'flpvi-gllimg-border-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-gllimg-border-clr-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-gllimg-brdrtype-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-gllimg-bdrrds-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-gllimg-padding-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-gllimg-margin-control'
	);
	//------ Gallery imgs style save end

	//------ Post Title style save start
	register_setting(
		'flpvi-group',
		'flpvi-producttitle-align'
	);
	register_setting(
		'flpvi-group',
		'flpvi-producttitle-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-producttitle-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-producttitle-size-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-producttitle-padding-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-producttitle-margin-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-producttitle-fontfamilly'
	);
	// Post Title hover save
	register_setting(
		'flpvi-group',
		'flpvi-producttitle-hover-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-producttitle-hover-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-producttitle-hover-size-control'
	);
	//------ Post Title style save end

	//------ Post Reg Price style save start
	register_setting(
		'flpvi-group',
		'flpvi-productregprice-align'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productregprice-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productregprice-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productregprice-size-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productregprice-padding-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productregprice-margin-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productregprice-fontfamilly'
	);
	// Post Reg Price hover save
	register_setting(
		'flpvi-group',
		'flpvi-productregprice-hover-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productregprice-hover-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productregprice-hover-size-control'
	);
	//------ Post Reg Price style save end

	//------ Post Sale Price style save start
	register_setting(
		'flpvi-group',
		'flpvi-productsaleprice-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productsaleprice-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productsaleprice-size-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productsaleprice-padding-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productsaleprice-margin-control'
	);
	// Post Sale Price hover save
	register_setting(
		'flpvi-group',
		'flpvi-productsaleprice-hover-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productsaleprice-hover-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productsaleprice-hover-size-control'
	);
	//------ Post Sale Price style save end

	//------ Post category style save start
	register_setting(
		'flpvi-group',
		'flpvi-productcategory-align'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productcategory-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productcategory-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productcategory-size-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productcategory-padding-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productcategory-margin-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productcategory-fontfamilly'
	);
	// Post category hover save
	register_setting(
		'flpvi-group',
		'flpvi-productcategory-hover-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productcategory-hover-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-productcategory-hover-size-control'
	);
	//------ Post category style save end

	//------ Post tags style save start
	register_setting(
		'flpvi-group',
		'flpvi-producttags-align'
	);
	register_setting(
		'flpvi-group',
		'flpvi-producttags-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-producttags-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-producttags-size-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-producttags-padding-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-producttags-margin-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-producttags-fontfamilly'
	);
	// Post tags hover save
	register_setting(
		'flpvi-group',
		'flpvi-producttags-hover-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-producttags-hover-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-producttags-hover-size-control'
	);
	//------ Post tags style save end

	// -------------********************** Related Post Style Start
	//------ Related Post Featured img style save start
	register_setting(
		'flpvi-group',
		'flpvi-relpro-fetuimg-align'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-fetuimg-border-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-fetuimg-border-clr-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-fetuimg-brdrtype-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-fetuimg-bdrrds-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-fetuimg-padding-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-fetuimg-margin-control'
	);
	//------ Related Post Featured img style save end

	//------ Related Post Title style save start
	register_setting(
		'flpvi-group',
		'flpvi-relpro-producttitle-align'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-producttitle-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-producttitle-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-producttitle-size-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-producttitle-padding-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-producttitle-margin-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-producttitle-fontfamilly'
	);
	// Related Post Title hover save
	register_setting(
		'flpvi-group',
		'flpvi-relpro-producttitle-hover-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-producttitle-hover-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-producttitle-hover-size-control'
	);
	//------ Related Post Title style save end

	//------ Related Post Reg Price style save start
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productregprice-align'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productregprice-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productregprice-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productregprice-size-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productregprice-padding-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productregprice-margin-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productregprice-fontfamilly'
	);
	// Related Post Reg Price hover save
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productregprice-hover-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productregprice-hover-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productregprice-hover-size-control'
	);
	//------ Related Post Reg Price style save end
	
	//------ Related Post Sale Price style save start
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productsaleprice-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productsaleprice-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productsaleprice-size-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productsaleprice-padding-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productsaleprice-margin-control'
	);
	// Related Post Sale Price hover save
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productsaleprice-hover-color-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productsaleprice-hover-bgcolor-control'
	);
	register_setting(
		'flpvi-group',
		'flpvi-relpro-productsaleprice-hover-size-control'
	);

// nouislider try
	register_setting(
		'flpvi-group',
		'flpvi-nouislider'
	);
	
	//------ Related Post Sale Price style save end
	// -------------********************** Related Post Style end
	//***************---****** Save Style end  (Tab)
	#################---#######111 Save or register settings end

	#################---#######222 Section settings start
	add_settings_section(
		'flpvi-header-section-sk',
		'',
		'flpvi_header_section',
		'flpvi_single'
	);
	add_settings_section(
		'flpvi-tab-section-sk',
		'',
		'flpvi_tab_section',
		'flpvi_single'
	);
	//***************---****** All Settings Tab Sections Start
	add_settings_section( //------ Archive Settings Section  (Tab)
		'flpvi-settings-sk',
		'',
		'flpvi_settings_sk',
		'flpvi_single'
	);
	add_settings_section( //------ General Settings Section  (Tab)
		'flpvi-general-settings-sk',
		'',
		'flpvi_general_settings_sk',
		'flpvi_single'
	);
	add_settings_section( //------ General Settings Section [For Related producs] (Tab)
		'flpvi-general-relpro-settings-sk',
		'',
		'flpvi_general_relpro_settings_sk',
		'flpvi_single'
	);
	//***************---****** All Settings Tab Sections end

	//***************---****** All Style Section (Tab) Start
	add_settings_section( //------ general style
		'flpvi-general-style',
		'',
		'flpvi_general_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ breadcrumb style
		'flpvi-breadcrumb-style',
		'',
		'flpvi_breadcrumb_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ breadcrumb hover style
		'flpvi-breadcrumb-hover-style',
		'',
		'flpvi_breadcrumb_hover_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ in stock or not style
		'flpvi-stockornot-style',
		'',
		'flpvi_stockornot_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ in stock or not hover style
		'flpvi-stockornot-hover-style',
		'',
		'flpvi_stockornot_hover_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ sale note style
		'flpvi-salenote-style',
		'',
		'flpvi_salenote_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ sale note hover style
		'flpvi-salenote-hover-style',
		'',
		'flpvi_salenote_hover_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ featured img
		'flpvi-featuredimg-style',
		'',
		'flpvi_featuredimg_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ gallery imgs
		'flpvi-galleryimgs-style',
		'',
		'flpvi_galleryimgs_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Post Title
		'flpvi-producttitle-style',
		'',
		'flpvi_producttitle_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Post Title hover style
		'flpvi-producttitle-hover-style',
		'',
		'flpvi_producttitle_hover_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Post Reg Price
		'flpvi-productregprice-style',
		'',
		'flpvi_productprice_reg_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Post Sale Price style
		'flpvi-productsaleprice-style',
		'',
		'flpvi_productprice_sale_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Post short description
		'flpvi-productshortdesc-style',
		'',
		'flpvi_productshortdesc_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Variables Post
		'flpvi-variablesproduct-style',
		'',
		'flpvi_variablesproduct_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Post category
		'flpvi-productcategory-style',
		'',
		'flpvi_productcategory_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Post hover category
		'flpvi-productcategory-hover-style',
		'',
		'flpvi_productcategory_hover_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Post tags
		'flpvi-producttags-style',
		'',
		'flpvi_producttags_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Post hover tags
		'flpvi-producttags-hover-style',
		'',
		'flpvi_producttags_hover_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Post Quantity
		'flpvi-post-quantity-style',
		'',
		'flpvi_product_quantity_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Post Add to Cart
		'flpvi-post-addtocart-style',
		'',
		'flpvi_product_addtocart_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Post Description & Review
		'flpvi-post-descandrev-style',
		'',
		'flpvi_product_descandrev_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Related Posts Styles
		'flpvi-related-post-styles',
		'',
		'flpvi_related_product_styles_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Related Posts Wrap Styles
		'flpvi-related-post-wrapper-styles',
		'',
		'flpvi_related_product_wrapper_styles_cb',
		'flpvi_single'
	);
	////////////////////////////////
	add_settings_section( //------ featured img
		'flpvi-relpro-featuredimg-style',
		'',
		'flpvi_relpro_featuredimg_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Post Title
		'flpvi-relpro-producttitle-style',
		'',
		'flpvi_relpro_producttitle_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Post Title hover style
		'flpvi-relpro-producttitle-hover-style',
		'',
		'flpvi_relpro_producttitle_hover_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Post Reg Price
		'flpvi-relpro-productregprice-style',
		'',
		'flpvi_relpro_productprice_reg_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Related Post sale Price
		'flpvi-relpro-productsaleprice-style',
		'',
		'flpvi_relpro_productprice_sale_style_cb',
		'flpvi_single'
	);
	add_settings_section( //------ Post More View
		'flpvi-relpro-post-addtocart-style',
		'',
		'flpvi_relpro_product_addtocart_style_cb',
		'flpvi_single'
	);
	add_settings_section(
		'flpvi-lb',
		'',
		'flpvi_lb_cb',
		'flpvi_single'
	);
	#################---#######222 Section settings end

	#################---#######333 Settings field start
	//***************---****** Settings inputs start (Tab)
	//------ Archive Settings start
	add_settings_field( // Use our style?
		'flpvi-enable-post-single-page',
		__('Use our style?','flexi-post-view'),
		'flpvi_lb_en_gallery_cb',
		'flpvi_single',
		'flpvi-settings-sk'
	);
	add_settings_field( // Choose Preset
		'flpvi-select-preset-single-post',
		__('','flexi-post-view'),
		'flpvi_button_position_cb',
		'flpvi_single',
		'flpvi-settings-sk'
	);
	//------ Archive Settings start

	//------ General Settings Controls start
	add_settings_field( // Check breadcrumb
		'flpvi-breadcrumb-check-gallery',
		__('Breadcrumb?','flexi-post-view'),
		'flpvi_breadcrumb_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check Stock
		'flpvi-stock-check-gallery',
		__('Stock Check','flexi-post-view'),
		'flpvi_stock_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check Sale
		'flpvi-sale-check-gallery',
		__('Check Sale %','flexi-post-view'),
		'flpvi_sale_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check featured
		'flpvi-featured-check-gallery',
		__('Check Featured?','flexi-post-view'),
		'flpvi_featured_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check featured
		'flpvi-featured-img-check-gallery',
		__('Featured img?','flexi-post-view'),
		'flpvi_featured_img_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check gallery
		'flpvi-gallery-img-check-gallery',
		__('Gallery?','flexi-post-view'),
		'flpvi_gallery_img_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check Title
		'flpvi-title-check-gallery',
		__('Check Title','flexi-post-view'),
		'flpvi_title_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Reviews count check
		'flpvi-revcntch-check-gallery',
		__('Reviews count check','flexi-post-view'),
		'flpvi_revcntch_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check Post Price
		'flpvi-reg-price-check-gallery',
		__('Post Price','flexi-post-view'),
		'flpvi_reg_price_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check Short Description?
		'flpvi-short-description-check-gallery',
		__('Short Description?','flexi-post-view'),
		'flpvi_short_description_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check Categories
		'flpvi-categories-check-gallery',
		__('Categories?','flexi-post-view'),
		'flpvi_categories_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check Tags
		'flpvi-tags-check-gallery',
		__('Tags?','flexi-post-view'),
		'flpvi_tags_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check SKU
		'flpvi-sku-check-gallery',
		__('SKU','flexi-post-view'),
		'flpvi_sku_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check add to cart
		'flpvi-actions-check-gallery',
		__('Actions?','flexi-post-view'),
		'flpvi_actions_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	add_settings_field( // Check description
		'flpvi-description-check-gallery',
		__('Description & Reviews?','flexi-post-view'),
		'flpvi_description_check_cb',
		'flpvi_single',
		'flpvi-general-settings-sk'
	);
	// Related Posts General Settings Controls start
	add_settings_field( // Check related posts
		'flpvi-related-posts-check-gallery',
		__('Related Posts','flexi-post-view'),
		'flpvi_related_products_check_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	add_settings_field( // Related Posts Top Title
		'flpvi-relpro-toptile-check-gallery',
		__('Top Title','flexi-post-view'),
		'flpvi_relpro_toptile_check_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);

	add_settings_field( // Related Posts Image
		'flpvi-relpro-prodimg-check-gallery',
		__('Post Image','flexi-post-view'),
		'flpvi_relpro_prodimg_check_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	add_settings_field( // Related Posts Image link
		'flpvi-relpro-imglnk-check-gallery',
		__('Image Link','flexi-post-view'),
		'flpvi_relpro_imglnk_check_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	add_settings_field( // Related Posts Title
		'flpvi-relpro-prodtitle-check-gallery',
		__('Post Title','flexi-post-view'),
		'flpvi_relpro_prodtitle_check_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	add_settings_field( // Related Posts Title link
		'flpvi-relpro-titlelnk-check-gallery',
		__('Title Link','flexi-post-view'),
		'flpvi_relpro_titlelnk_check_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	add_settings_field( // Related Posts price
		'flpvi-relpro-prodpric-check-gallery',
		__('Post Price','flexi-post-view'),
		'flpvi_relpro_prodpric_check_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	add_settings_field( // Related Posts button
		'flpvi-relpro-button-check-gallery',
		__('Button','flexi-post-view'),
		'flpvi_relpro_button_check_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	add_settings_field( // Related Posts count
		'flpvi-relpro-count-gallery',
		__('Post Limit','flexi-post-view'),
		'flpvi_relpro_count_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	add_settings_field( // Related Exclud Post
		'flpvi-relpro-excdpro-gallery',
		__('Exclud Post','flexi-post-view'),
		'flpvi_relpro_excdpro_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	add_settings_field( // Related Posts Description
		'flpvi-relpro-dsc-check-gallery',
		__('Description?','flexi-post-view'),
		'flpvi_relpro_dsc_check_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	add_settings_field( // Related Posts Word Length
		'flpvi-relpro-dscwordl-gallery',
		__('Word Length','flexi-post-view'),
		'flpvi_relpro_dscwordl_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	add_settings_field( // Related Posts Description Indicator
		'flpvi-relpro-dscind-gallery',
		__('Description Indicator','flexi-post-view'),
		'flpvi_relpro_dscind_cb',
		'flpvi_single',
		'flpvi-general-relpro-settings-sk'
	);
	// Related Posts General Settings Controls end
	//------ General Settings Controls end
	//***************---****** Settings inputs end (Tab)

	//***************---****** Style inputs start (Tab)
	//------ General style controls start
	add_settings_field(
		'flpvi-general-style-fsize',
		__('Font Size','flexi-post-view'),
		'flpvi_button_fsize_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-general-title-clr',
		__('Title Color','flexi-post-view'),
		'flpvi_btn_bgc_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-btn-hover-bgc',
		__('Hover Title Color','flexi-post-view'),
		'flpvi_btn_hover_bgc_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-button-color',
		__('Text Color','flexi-post-view'),
		'flpvi_button_color_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-btn-ps',
		__('Title Padding','flexi-post-view'),
		'flpvi_btn_ps_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-btn-margin',
		__('Title Margin','flexi-post-view'),
		'flpvi_btn_margin_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-btn-btype',
		__('Border Style','flexi-post-view'),
		'flpvi_btn_btype_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-btn-bs',
		__('Border Size','flexi-post-view'),
		'flpvi_btn_bs_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-btn-bors',
		__('Border Radius','flexi-post-view'),
		'flpvi_btn_bors',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-btn-bc',
		__('Border Color','flexi-post-view'),
		'flpvi_btn_bc_cb',
		'flpvi_single',
		'flpvi-general-style');
	add_settings_field(
		'flpvi-btn-iconc',
		__('Icon Color','flexi-post-view'),
		'flpvi_btn_iconc_cb',
		'flpvi_single',
		'flpvi-general-style'
	);
	//------ General style controls end

	//------ Breadcrumb style controls start
	add_settings_field(
		'flpvi-breadalign',
		__('Alignment','flexi-post-view'),
		'flpvi_breadalign_fld',
		'flpvi_single',
		'flpvi-breadcrumb-style');
	add_settings_field(
		'flpvi-text-color-control',
		__('Font Color','flexi-post-view'),
		'flpvi_text_color_fld',
		'flpvi_single',
		'flpvi-breadcrumb-style');
	add_settings_field(
		'flpvi-crnttext-color-control',
		__('Current Page Color','flexi-post-view'),
		'flpvi_crnttext_color_fld',
		'flpvi_single',
		'flpvi-breadcrumb-style');
	add_settings_field(
		'flpvi-text-bgcolor-control',
		__('BG Color','flexi-post-view'),
		'flpvi_text_bgcolor_fld',
		'flpvi_single',
		'flpvi-breadcrumb-style');
	add_settings_field(
		'flpvi-breadcrumb-size-control',
		__('Size','flexi-post-view'),
		'flpvi_breadcrumb_size_fld',
		'flpvi_single',
		'flpvi-breadcrumb-style');
	add_settings_field(
		'flpvi-breadcrumb-padding-control',
		__('Padding','flexi-post-view'),
		'flpvi_breadcrumb_padding_fld',
		'flpvi_single',
		'flpvi-breadcrumb-style');
	add_settings_field(
		'flpvi-breadcrumb-margin-control',
		__('Margin','flexi-post-view'),
		'flpvi_breadcrumb_margin_fld',
		'flpvi_single',
		'flpvi-breadcrumb-style');
	add_settings_field(
		'flpvi-fontfamilly',
		__('Font Family','flexi-post-view'),
		'flpvi_fontfamilly_cb',
		'flpvi_single',
		'flpvi-breadcrumb-style');

		// Hover start
	add_settings_field(
		'flpvi-breadcrumb-hover-color-control',
		__('Color','flexi-post-view'),
		'flpvi_breadcrumb_hover_color_fld',
		'flpvi_single',
		'flpvi-breadcrumb-hover-style');
	add_settings_field(
		'flpvi-breadcrumb-hover-bgcolor-control',
		__('BG Color','flexi-post-view'),
		'flpvi_breadcrumb_hover_bgcolor_fld',
		'flpvi_single',
		'flpvi-breadcrumb-hover-style');
	add_settings_field(
		'flpvi-breadcrumb-hover-size-control',
		__('Size','flexi-post-view'),
		'flpvi_breadcrumb_hover_size_fld',
		'flpvi_single',
		'flpvi-breadcrumb-hover-style');
	//------ Breadcrumb style controls end

	//------ Stock or Not style controls start
	add_settings_field(
		'flpvi-stockornotalign',
		__('Alignment','flexi-post-view'),
		'flpvi_stockornotalign_fld',
		'flpvi_single',
		'flpvi-stockornot-style');
	add_settings_field(
		'flpvi-stockornot-color-control',
		__('Font Color','flexi-post-view'),
		'flpvi_stockornot_color_fld',
		'flpvi_single',
		'flpvi-stockornot-style');
	add_settings_field(
		'flpvi-stockornot-bgcolor-control',
		__('BG Color','flexi-post-view'),
		'flpvi_stockornot_bgcolor_fld',
		'flpvi_single',
		'flpvi-stockornot-style');
	add_settings_field(
		'flpvi-stockornot-size-control',
		__('Size','flexi-post-view'),
		'flpvi_stockornot_size_fld',
		'flpvi_single',
		'flpvi-stockornot-style');
	add_settings_field(
		'flpvi-stockornot-padding-control',
		__('Padding','flexi-post-view'),
		'flpvi_stockornot_padding_fld',
		'flpvi_single',
		'flpvi-stockornot-style');
	add_settings_field(
		'flpvi-stockornot-margin-control',
		__('Margin','flexi-post-view'),
		'flpvi_stockornot_margin_fld',
		'flpvi_single',
		'flpvi-stockornot-style');
	add_settings_field(
		'flpvi-stockornot-fontfamilly-control',
		__('Font Family','flexi-post-view'),
		'flpvi_stockornot_fontfamilly_fld',
		'flpvi_single',
		'flpvi-stockornot-style');

		// Hover start
	add_settings_field(
		'flpvi-stockornot-hover-color-control',
		__('Color','flexi-post-view'),
		'flpvi_stockornot_hover_color_fld',
		'flpvi_single',
		'flpvi-stockornot-hover-style');
	add_settings_field(
		'flpvi-stockornot-hover-bgcolor-control',
		__('BG Color','flexi-post-view'),
		'flpvi_stockornot_hover_bgcolor_fld',
		'flpvi_single',
		'flpvi-stockornot-hover-style');
	add_settings_field(
		'flpvi-stockornot-hover-size-control',
		__('Size','flexi-post-view'),
		'flpvi_stockornot_hover_size_fld',
		'flpvi_single',
		'flpvi-stockornot-hover-style');
	//------ Stock or Not style controls end

	//------ Sale Note style controls start
	add_settings_field(
		'flpvi-salenotealign',
		__('Alignment','flexi-post-view'),
		'flpvi_salenotealign_fld',
		'flpvi_single',
		'flpvi-salenote-style');
	add_settings_field(
		'flpvi-salenote-color-control',
		__('Font Color','flexi-post-view'),
		'flpvi_salenote_color_fld',
		'flpvi_single',
		'flpvi-salenote-style');
	add_settings_field(
		'flpvi-salenote-bgcolor-control',
		__('BG Color','flexi-post-view'),
		'flpvi_salenote_bgcolor_fld',
		'flpvi_single',
		'flpvi-salenote-style');
	add_settings_field(
		'flpvi-salenote-size-control',
		__('Size','flexi-post-view'),
		'flpvi_salenote_size_fld',
		'flpvi_single',
		'flpvi-salenote-style');
	add_settings_field(
		'flpvi-salenote-padding-control',
		__('Padding','flexi-post-view'),
		'flpvi_salenote_padding_fld',
		'flpvi_single',
		'flpvi-salenote-style');
	add_settings_field(
		'flpvi-salenote-margin-control',
		__('Margin','flexi-post-view'),
		'flpvi_salenote_margin_fld',
		'flpvi_single',
		'flpvi-salenote-style');

		// Hover start
	add_settings_field(
		'flpvi-salenote-hover-color-control',
		__('Color','flexi-post-view'),
		'flpvi_salenote_hover_color_fld',
		'flpvi_single',
		'flpvi-salenote-hover-style');
	add_settings_field(
		'flpvi-salenote-hover-bgcolor-control',
		__('BG Color','flexi-post-view'),
		'flpvi_salenote_hover_bgcolor_fld',
		'flpvi_single',
		'flpvi-salenote-hover-style');
	add_settings_field(
		'flpvi-salenote-hover-size-control',
		__('Size','flexi-post-view'),
		'flpvi_salenote_hover_size_fld',
		'flpvi_single',
		'flpvi-salenote-hover-style');
	//------ Sale Note style controls end

	//------ Featured img controls start
	add_settings_field(
		'flpvi-fetuimg-align',
		__('Alignment','flexi-post-view'),
		'flpvi_fetuimg_align_fld',
		'flpvi_single',
		'flpvi-featuredimg-style');
	add_settings_field(
		'flpvi-fetuimg-border-control',
		__('Border','flexi-post-view'),
		'flpvi_fetuimg_border_fld',
		'flpvi_single',
		'flpvi-featuredimg-style');
	add_settings_field(
		'flpvi-fetuimg-border-clr-control',
		__('Color','flexi-post-view'),
		'flpvi_fetuimg_border_clr_fld',
		'flpvi_single',
		'flpvi-featuredimg-style');
	add_settings_field(
		'flpvi-fetuimg-brdrtype-control',
		__('Border Type','flexi-post-view'),
		'flpvi_fetuimg_brdrtype_fld',
		'flpvi_single',
		'flpvi-featuredimg-style');
	add_settings_field(
		'flpvi-fetuimg-bdrrds-control',
		__('Border Radius','flexi-post-view'),
		'flpvi_fetuimg_bdrrds_fld',
		'flpvi_single',
		'flpvi-featuredimg-style');
	add_settings_field(
		'flpvi-fetuimg-padding-control',
		__('Padding','flexi-post-view'),
		'flpvi_fetuimg_padding_fld',
		'flpvi_single',
		'flpvi-featuredimg-style');
	add_settings_field(
		'flpvi-fetuimg-margin-control',
		__('Margin','flexi-post-view'),
		'flpvi_fetuimg_margin_fld',
		'flpvi_single',
		'flpvi-featuredimg-style');
	//------ Featured img controls end

	//------ Gallery imgs controls start
	add_settings_field(
		'flpvi-gllimg-border-control',
		__('Border','flexi-post-view'),
		'flpvi_gllimg_border_fld',
		'flpvi_single',
		'flpvi-galleryimgs-style');
	add_settings_field(
		'flpvi-gllimg-border-clr-control',
		__('Color','flexi-post-view'),
		'flpvi_gllimg_border_clr_fld',
		'flpvi_single',
		'flpvi-galleryimgs-style');
	add_settings_field(
		'flpvi-gllimg-brdrtype-control',
		__('Border Type','flexi-post-view'),
		'flpvi_gllimg_brdrtype_fld',
		'flpvi_single',
		'flpvi-galleryimgs-style');
	add_settings_field(
		'flpvi-gllimg-bdrrds-control',
		__('Border Radius','flexi-post-view'),
		'flpvi_gllimg_bdrrds_fld',
		'flpvi_single',
		'flpvi-galleryimgs-style');
	add_settings_field(
		'flpvi-gllimg-padding-control',
		__('Padding','flexi-post-view'),
		'flpvi_gllimg_padding_fld',
		'flpvi_single',
		'flpvi-galleryimgs-style');
	add_settings_field(
		'flpvi-gllimg-margin-control',
		__('Margin','flexi-post-view'),
		'flpvi_gllimg_margin_fld',
		'flpvi_single',
		'flpvi-galleryimgs-style');
	//------ Gallery imgs controls end

	//------ Post Title style controls start
	add_settings_field(
		'flpvi-producttitle-align',
		__('Alignment','flexi-post-view'),
		'flpvi_producttitle_align_fld',
		'flpvi_single',
		'flpvi-producttitle-style');
	add_settings_field(
		'flpvi-producttitle-color-control',
		__('Font Color','flexi-post-view'),
		'flpvi_producttitle_color_fld',
		'flpvi_single',
		'flpvi-producttitle-style');
	add_settings_field(
		'flpvi-producttitle-bgcolor-control',
		__('BG Color','flexi-post-view'),
		'flpvi_producttitle_bgcolor_fld',
		'flpvi_single',
		'flpvi-producttitle-style');
	add_settings_field(
		'flpvi-producttitle-size-control',
		__('Size','flexi-post-view'),
		'flpvi_producttitle_size_fld',
		'flpvi_single',
		'flpvi-producttitle-style');
	add_settings_field(
		'flpvi-producttitle-padding-control',
		__('Padding','flexi-post-view'),
		'flpvi_producttitle_padding_fld',
		'flpvi_single',
		'flpvi-producttitle-style');
	add_settings_field(
		'flpvi-producttitle-margin-control',
		__('Margin','flexi-post-view'),
		'flpvi_producttitle_margin_fld',
		'flpvi_single',
		'flpvi-producttitle-style');
	add_settings_field(
		'flpvi-producttitle-fontfamilly',
		__('Font Family','flexi-post-view'),
		'flpvi_producttitle_fontfamilly_cb',
		'flpvi_single',
		'flpvi-producttitle-style');

		// Hover start
	add_settings_field(
		'flpvi-producttitle-hover-color-control',
		__('Color','flexi-post-view'),
		'flpvi_producttitle_hover_color_fld',
		'flpvi_single',
		'flpvi-producttitle-hover-style');
	add_settings_field(
		'flpvi-producttitle-hover-bgcolor-control',
		__('BG Color','flexi-post-view'),
		'flpvi_producttitle_hover_bgcolor_fld',
		'flpvi_single',
		'flpvi-producttitle-hover-style');
	add_settings_field(
		'flpvi-producttitle-hover-size-control',
		__('Size','flexi-post-view'),
		'flpvi_producttitle_hover_size_fld',
		'flpvi_single',
		'flpvi-producttitle-hover-style');
	//------ Post Title style controls end

	//------ Post Reg Price style controls start
	add_settings_field(
		'flpvi-productregprice-align',
		__('Alignment','flexi-post-view'),
		'flpvi_productregprice_align_fld',
		'flpvi_single',
		'flpvi-productregprice-style');
	add_settings_field(
		'flpvi-productregprice-color-control',
		__('Font Color','flexi-post-view'),
		'flpvi_productregprice_color_fld',
		'flpvi_single',
		'flpvi-productregprice-style');
	add_settings_field(
		'flpvi-productregprice-bgcolor-control',
		__('BG Color','flexi-post-view'),
		'flpvi_productregprice_bgcolor_fld',
		'flpvi_single',
		'flpvi-productregprice-style');
	add_settings_field(
		'flpvi-productregprice-size-control',
		__('Size','flexi-post-view'),
		'flpvi_productregprice_size_fld',
		'flpvi_single',
		'flpvi-productregprice-style');
	add_settings_field(
		'flpvi-productregprice-padding-control',
		__('Padding','flexi-post-view'),
		'flpvi_productregprice_padding_fld',
		'flpvi_single',
		'flpvi-productregprice-style');
	add_settings_field(
		'flpvi-productregprice-margin-control',
		__('Margin','flexi-post-view'),
		'flpvi_productregprice_margin_fld',
		'flpvi_single',
		'flpvi-productregprice-style');
	add_settings_field(
		'flpvi-productregprice-fontfamilly',
		__('Font Family','flexi-post-view'),
		'flpvi_productregprice_fontfamilly_cb',
		'flpvi_single',
		'flpvi-productregprice-style');

		// Hover start
	add_settings_field(
		'flpvi-productregprice-hover-color-control',
		__('Hover Color','flexi-post-view'),
		'flpvi_productregprice_hover_color_fld',
		'flpvi_single',
		'flpvi-productregprice-style');
	add_settings_field(
		'flpvi-productregprice-hover-bgcolor-control',
		__('Hover BG Color','flexi-post-view'),
		'flpvi_productregprice_hover_bgcolor_fld',
		'flpvi_single',
		'flpvi-productregprice-style');
	add_settings_field(
		'flpvi-productregprice-hover-size-control',
		__('Hover Size','flexi-post-view'),
		'flpvi_productregprice_hover_size_fld',
		'flpvi_single',
		'flpvi-productregprice-style');
	//------ Post Reg Price style controls end

	//------ Post Sale Post style controls start
	add_settings_field(
		'flpvi-productsaleprice-color-control',
		__('Font Color','flexi-post-view'),
		'flpvi_productsaleprice_color_fld',
		'flpvi_single',
		'flpvi-productsaleprice-style');
	add_settings_field(
		'flpvi-productsaleprice-bgcolor-control',
		__('BG Color','flexi-post-view'),
		'flpvi_productsaleprice_bgcolor_fld',
		'flpvi_single',
		'flpvi-productsaleprice-style');
	add_settings_field(
		'flpvi-productsaleprice-size-control',
		__('Size','flexi-post-view'),
		'flpvi_productsaleprice_size_fld',
		'flpvi_single',
		'flpvi-productsaleprice-style');
	add_settings_field(
		'flpvi-productsaleprice-padding-control',
		__('Padding','flexi-post-view'),
		'flpvi_productsaleprice_padding_fld',
		'flpvi_single',
		'flpvi-productsaleprice-style');
	add_settings_field(
		'flpvi-productsaleprice-margin-control',
		__('Margin','flexi-post-view'),
		'flpvi_productsaleprice_margin_fld',
		'flpvi_single',
		'flpvi-productsaleprice-style');

		// Hover start
	add_settings_field(
		'flpvi-productsaleprice-hover-color-control',
		__('Hover Color','flexi-post-view'),
		'flpvi_productsaleprice_hover_color_fld',
		'flpvi_single',
		'flpvi-productsaleprice-style');
	add_settings_field(
		'flpvi-productsaleprice-hover-bgcolor-control',
		__('Hover BG Color','flexi-post-view'),
		'flpvi_productsaleprice_hover_bgcolor_fld',
		'flpvi_single',
		'flpvi-productsaleprice-style');
	add_settings_field(
		'flpvi-productsaleprice-hover-size-control',
		__('Hover Size','flexi-post-view'),
		'flpvi_productsaleprice_hover_size_fld',
		'flpvi_single',
		'flpvi-productsaleprice-style');
	//------ Post Sale Post style controls end

	//------ Post Categories style controls start
	add_settings_field(
		'flpvi-productcategory-align',
		__('Alignment','flexi-post-view'),
		'flpvi_productcategory_align_fld',
		'flpvi_single',
		'flpvi-productcategory-style');
	add_settings_field(
		'flpvi-productcategory-color-control',
		__('Font Color','flexi-post-view'),
		'flpvi_productcategory_color_fld',
		'flpvi_single',
		'flpvi-productcategory-style');
	add_settings_field(
		'flpvi-productcategory-bgcolor-control',
		__('BG Color','flexi-post-view'),
		'flpvi_productcategory_bgcolor_fld',
		'flpvi_single',
		'flpvi-productcategory-style');
	add_settings_field(
		'flpvi-productcategory-size-control',
		__('Size','flexi-post-view'),
		'flpvi_productcategory_size_fld',
		'flpvi_single',
		'flpvi-productcategory-style');
	add_settings_field(
		'flpvi-productcategory-padding-control',
		__('Padding','flexi-post-view'),
		'flpvi_productcategory_padding_fld',
		'flpvi_single',
		'flpvi-productcategory-style');
	add_settings_field(
		'flpvi-productcategory-margin-control',
		__('Margin','flexi-post-view'),
		'flpvi_productcategory_margin_fld',
		'flpvi_single',
		'flpvi-productcategory-style');
	add_settings_field(
		'flpvi-productcategory-fontfamilly',
		__('Font Family','flexi-post-view'),
		'flpvi_productcategory_fontfamilly_cb',
		'flpvi_single',
		'flpvi-productcategory-style');

		// Hover start
	add_settings_field(
		'flpvi-productcategory-hover-color-control',
		__('Hover Color','flexi-post-view'),
		'flpvi_productcategory_hover_color_fld',
		'flpvi_single',
		'flpvi-productcategory-hover-style');
	add_settings_field(
		'flpvi-productcategory-hover-bgcolor-control',
		__('Hover BG Color','flexi-post-view'),
		'flpvi_productcategory_hover_bgcolor_fld',
		'flpvi_single',
		'flpvi-productcategory-hover-style');
	add_settings_field(
		'flpvi-productcategory-hover-size-control',
		__('Hover Size','flexi-post-view'),
		'flpvi_productcategory_hover_size_fld',
		'flpvi_single',
		'flpvi-productcategory-hover-style');
	//------ Post Categories style controls end

	//------ Post Tags style controls start
	add_settings_field(
		'flpvi-producttags-align',
		__('Alignment','flexi-post-view'),
		'flpvi_producttags_align_fld',
		'flpvi_single',
		'flpvi-producttags-style');
	add_settings_field(
		'flpvi-producttags-color-control',
		__('Font Color','flexi-post-view'),
		'flpvi_producttags_color_fld',
		'flpvi_single',
		'flpvi-producttags-style');
	add_settings_field(
		'flpvi-producttags-bgcolor-control',
		__('BG Color','flexi-post-view'),
		'flpvi_producttags_bgcolor_fld',
		'flpvi_single',
		'flpvi-producttags-style');
	add_settings_field(
		'flpvi-producttags-size-control',
		__('Size','flexi-post-view'),
		'flpvi_producttags_size_fld',
		'flpvi_single',
		'flpvi-producttags-style');
	add_settings_field(
		'flpvi-producttags-padding-control',
		__('Padding','flexi-post-view'),
		'flpvi_producttags_padding_fld',
		'flpvi_single',
		'flpvi-producttags-style');
	add_settings_field(
		'flpvi-producttags-margin-control',
		__('Margin','flexi-post-view'),
		'flpvi_producttags_margin_fld',
		'flpvi_single',
		'flpvi-producttags-style');
	add_settings_field(
		'flpvi-producttags-fontfamilly',
		__('Font Family','flexi-post-view'),
		'flpvi_producttags_fontfamilly_cb',
		'flpvi_single',
		'flpvi-producttags-style');

		// Hover start
	add_settings_field(
		'flpvi-producttags-hover-color-control',
		__('Hover Color','flexi-post-view'),
		'flpvi_producttags_hover_color_fld',
		'flpvi_single',
		'flpvi-producttags-hover-style');
	add_settings_field(
		'flpvi-producttags-hover-bgcolor-control',
		__('Hover BG Color','flexi-post-view'),
		'flpvi_producttags_hover_bgcolor_fld',
		'flpvi_single',
		'flpvi-producttags-hover-style');
	add_settings_field(
		'flpvi-producttags-hover-size-control',
		__('Hover Size','flexi-post-view'),
		'flpvi_producttags_hover_size_fld',
		'flpvi_single',
		'flpvi-producttags-hover-style');
	//------ Post Tags style controls end

	// -------------********************** Related Post Style start
	//------ Featured img controls start
	add_settings_field(
		'flpvi-relpro-fetuimg-align',
		__('Alignment','flexi-post-view'),
		'flpvi_relpro_fetuimg_align_fld',
		'flpvi_single',
		'flpvi-relpro-featuredimg-style');
	add_settings_field(
		'flpvi-relpro-fetuimg-border-control',
		__('Border','flexi-post-view'),
		'flpvi_relpro_fetuimg_border_fld',
		'flpvi_single',
		'flpvi-relpro-featuredimg-style');
	add_settings_field(
		'flpvi-relpro-fetuimg-border-clr-control',
		__('Color','flexi-post-view'),
		'flpvi_relpro_fetuimg_border_clr_fld',
		'flpvi_single',
		'flpvi-relpro-featuredimg-style');
	add_settings_field(
		'flpvi-relpro-fetuimg-brdrtype-control',
		__('Border Type','flexi-post-view'),
		'flpvi_relpro_fetuimg_brdrtype_fld',
		'flpvi_single',
		'flpvi-relpro-featuredimg-style');
	add_settings_field(
		'flpvi-relpro-fetuimg-bdrrds-control',
		__('Border Radius','flexi-post-view'),
		'flpvi_relpro_fetuimg_bdrrds_fld',
		'flpvi_single',
		'flpvi-relpro-featuredimg-style');
	add_settings_field(
		'flpvi-relpro-fetuimg-padding-control',
		__('Padding','flexi-post-view'),
		'flpvi_relpro_fetuimg_padding_fld',
		'flpvi_single',
		'flpvi-relpro-featuredimg-style');
	add_settings_field(
		'flpvi-relpro-fetuimg-margin-control',
		__('Margin','flexi-post-view'),
		'flpvi_relpro_fetuimg_margin_fld',
		'flpvi_single',
		'flpvi-relpro-featuredimg-style');
	//------ Featured img controls end

	//------ Post Title style controls start
	add_settings_field(
		'flpvi-relpro-producttitle-align',
		__('Alignment','flexi-post-view'),
		'flpvi_relpro_producttitle_align_fld',
		'flpvi_single',
		'flpvi-relpro-producttitle-style');
	add_settings_field(
		'flpvi-relpro-producttitle-color-control',
		__('Font Color','flexi-post-view'),
		'flpvi_relpro_producttitle_color_fld',
		'flpvi_single',
		'flpvi-relpro-producttitle-style');
	add_settings_field(
		'flpvi-relpro-producttitle-bgcolor-control',
		__('BG Color','flexi-post-view'),
		'flpvi_relpro_producttitle_bgcolor_fld',
		'flpvi_single',
		'flpvi-relpro-producttitle-style');
	add_settings_field(
		'flpvi-relpro-producttitle-size-control',
		__('Size','flexi-post-view'),
		'flpvi_relpro_producttitle_size_fld',
		'flpvi_single',
		'flpvi-relpro-producttitle-style');
	add_settings_field(
		'flpvi-relpro-producttitle-padding-control',
		__('Padding','flexi-post-view'),
		'flpvi_relpro_producttitle_padding_fld',
		'flpvi_single',
		'flpvi-relpro-producttitle-style');
	add_settings_field(
		'flpvi-relpro-producttitle-margin-control',
		__('Margin','flexi-post-view'),
		'flpvi_relpro_producttitle_margin_fld',
		'flpvi_single',
		'flpvi-relpro-producttitle-style');
	add_settings_field(
		'flpvi-relpro-producttitle-fontfamilly',
		__('Font Family','flexi-post-view'),
		'flpvi_relpro_producttitle_fontfamilly_cb',
		'flpvi_single',
		'flpvi-relpro-producttitle-style');

		// Hover start
	add_settings_field(
		'flpvi-relpro-producttitle-hover-color-control',
		__('Color','flexi-post-view'),
		'flpvi_relpro_producttitle_hover_color_fld',
		'flpvi_single',
		'flpvi-relpro-producttitle-hover-style');
	add_settings_field(
		'flpvi-relpro-producttitle-hover-bgcolor-control',
		__('BG Color','flexi-post-view'),
		'flpvi_relpro_producttitle_hover_bgcolor_fld',
		'flpvi_single',
		'flpvi-relpro-producttitle-hover-style');
	add_settings_field(
		'flpvi-relpro-producttitle-hover-size-control',
		__('Size','flexi-post-view'),
		'flpvi_relpro_producttitle_hover_size_fld',
		'flpvi_single',
		'flpvi-relpro-producttitle-hover-style');
	//------ Post Title style controls end

	//------ Related Post Reg Price style controls start
	add_settings_field(
		'flpvi-relpro-productregprice-align',
		__('Alignment','flexi-post-view'),
		'flpvi_relpro_productregprice_align_fld',
		'flpvi_single',
		'flpvi-relpro-productregprice-style');
	add_settings_field(
		'flpvi-relpro-productregprice-color-control',
		__('Font Color','flexi-post-view'),
		'flpvi_relpro_productregprice_color_fld',
		'flpvi_single',
		'flpvi-relpro-productregprice-style');
	add_settings_field(
		'flpvi-relpro-productregprice-bgcolor-control',
		__('BG Color','flexi-post-view'),
		'flpvi_relpro_productregprice_bgcolor_fld',
		'flpvi_single',
		'flpvi-relpro-productregprice-style');
	add_settings_field(
		'flpvi-relpro-productregprice-size-control',
		__('Size','flexi-post-view'),
		'flpvi_relpro_productregprice_size_fld',
		'flpvi_single',
		'flpvi-relpro-productregprice-style');
	add_settings_field(
		'flpvi-relpro-productregprice-padding-control',
		__('Padding','flexi-post-view'),
		'flpvi_relpro_productregprice_padding_fld',
		'flpvi_single',
		'flpvi-relpro-productregprice-style');
	add_settings_field(
		'flpvi-relpro-productregprice-margin-control',
		__('Margin','flexi-post-view'),
		'flpvi_relpro_productregprice_margin_fld',
		'flpvi_single',
		'flpvi-relpro-productregprice-style');
	add_settings_field(
		'flpvi-relpro-productregprice-fontfamilly',
		__('Font Family','flexi-post-view'),
		'flpvi_relpro_productregprice_fontfamilly_cb',
		'flpvi_single',
		'flpvi-relpro-productregprice-style');

		// Hover start
	add_settings_field(
		'flpvi-relpro-productregprice-hover-color-control',
		__('Hover Color','flexi-post-view'),
		'flpvi_relpro_productregprice_hover_color_fld',
		'flpvi_single',
		'flpvi-relpro-productregprice-style');
	add_settings_field(
		'flpvi-relpro-productregprice-hover-bgcolor-control',
		__('Hover BG Color','flexi-post-view'),
		'flpvi_relpro_productregprice_hover_bgcolor_fld',
		'flpvi_single',
		'flpvi-relpro-productregprice-style');
	add_settings_field(
		'flpvi-relpro-productregprice-hover-size-control',
		__('Hover Size','flexi-post-view'),
		'flpvi_relpro_productregprice_hover_size_fld',
		'flpvi_single',
		'flpvi-relpro-productregprice-style');
	//------ Related Post Reg Price style controls end
	
	//------ Related Post Sale Post style controls start
	add_settings_field(
		'flpvi-relpro-productsaleprice-color-control',
		__('Font Color','flexi-post-view'),
		'flpvi_relpro_productsaleprice_color_fld',
		'flpvi_single',
		'flpvi-relpro-productsaleprice-style');
	add_settings_field(
		'flpvi-relpro-productsaleprice-bgcolor-control',
		__('BG Color','flexi-post-view'),
		'flpvi_relpro_productsaleprice_bgcolor_fld',
		'flpvi_single',
		'flpvi-relpro-productsaleprice-style');
	add_settings_field(
		'flpvi-relpro-productsaleprice-size-control',
		__('Size','flexi-post-view'),
		'flpvi_relpro_productsaleprice_size_fld',
		'flpvi_single',
		'flpvi-relpro-productsaleprice-style');
	add_settings_field(
		'flpvi-relpro-productsaleprice-padding-control',
		__('Padding','flexi-post-view'),
		'flpvi_relpro_productsaleprice_padding_fld',
		'flpvi_single',
		'flpvi-relpro-productsaleprice-style');
	add_settings_field(
		'flpvi-relpro-productsaleprice-margin-control',
		__('Margin','flexi-post-view'),
		'flpvi_relpro_productsaleprice_margin_fld',
		'flpvi_single',
		'flpvi-relpro-productsaleprice-style');

		// Hover start
	add_settings_field(
		'flpvi-relpro-productsaleprice-hover-color-control',
		__('Hover Color','flexi-post-view'),
		'flpvi_relpro_productsaleprice_hover_color_fld',
		'flpvi_single',
		'flpvi-relpro-productsaleprice-style');
	add_settings_field(
		'flpvi-relpro-productsaleprice-hover-bgcolor-control',
		__('Hover BG Color','flexi-post-view'),
		'flpvi_relpro_productsaleprice_hover_bgcolor_fld',
		'flpvi_single',
		'flpvi-relpro-productsaleprice-style');
	add_settings_field(
		'flpvi-relpro-productsaleprice-hover-size-control',
		__('Hover Size','flexi-post-view'),
		'flpvi_relpro_productsaleprice_hover_size_fld',
		'flpvi_single',
		'flpvi-relpro-productsaleprice-style');

		// For try a noUiSlider
	add_settings_field(
		'flpvi-nouislider',
		__('noUiSlider','flexi-post-view'),
		'flpvi_try_nouislider_fld',
		'flpvi_single',
		'flpvi-relpro-productsaleprice-style');
	//------ Related Post Sale Post style controls end
	// -------------********************** Related Post Style end
	//***************---****** Style inputs end (Tab)
	#################---#######333 Settings field end