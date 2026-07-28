    <script type="text/template" id="template-content-builder-render">
    <%
    _.each(data.builderValue.sections, function(section){
    %>
    <%=data._this.render("section",section, ["rows","sectionid","settings"])%>
    <%})%>
</script>
    <!-- Items -->
    <script type="text/template" id="template-content-builder-render-section">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("agm_section")),
	isImage = settings.background == 'image' && settings.image !== "",
	isVideo = settings.background == 'video' && settings.video !== "",
	isCustomBackground = settings.background == 'custom' && settings.customBackground !== "",
	isOverlay = ( settings.background == 'color' && settings.backgroundOverlay !== "" ) || ( isVideo ) || ( isImage && settings.backgroundOverlay != "" );
%>
<%if(settings.noWrap === true){%>
	<%
	_.each(data.rows, function(row){
	%>
		<%=data._this.render("row",row, ["columns","rowid","settings","dataTemplate"])%>
	<%})%>
<%} else {%>
	<%
	var sectionClass = [
		"uk-section",
		<!-- ( settings.enableScroller ? "section" : "" ), -->
		( settings.height !== "" ? settings.verticalAlignment : "" ),
		( settings.removeTopPadding ? 'uk-padding-remove-top' : '' ),
		( settings.removeBottomPadding ? 'uk-padding-remove-bottom' : '' ),
		settings.padding,
	];
	var sectionAttrs = {
		class:[
			settings.style,
			settings.visibility,
			( ( settings.style == 'uk-section-default' || settings.style == 'uk-section-muted' ) ? settings.textColor : '' ),
			( ( settings.style !== 'uk-section-default' && settings.style !== 'uk-section-muted' && settings.preserveColor ) ? 'uk-preserve-color' : '' ),
			( isImage && settings.backgroundOverlay != "" ? 'uk-position-relative' : '' ),
			( isOverlay ? 'uk-position-relative' : '' ),
			( settings.language == "disabled" ||  ( !_.isEmpty(settings.language) && settings.language !== "disabled" ))? "notranslate" : ""
		]
	};
	if( !_.isEmpty(settings.language) && settings.language !== "disabled" ){
		sectionAttrs["lang"] = settings.language;
	}
	if( !_.isEmpty(settings.id) ){
		sectionAttrs["id"] = settings.id;
	}

	var backgroundAttrs	= { 
		class : [  
			( isImage ? settings.backgroundSize : '' ),
			( isImage ? settings.backgroundPosition : '' ),
			( isImage && settings.backgroundEffect == 'uk-background-fixed' ? settings.backgroundEffect : '' ),
			( isImage ? settings.backgroundVisibility : '' ),
		]
	};
	var containerAttrs	= { 
		class: [ 
			settings.container,
			settings.containerExpand,
			( isOverlay ? 'uk-position-relative' : '' ),
			( isOverlay && settings.container == "" ? 'uk-panel' : '' ),
		]
	};
	if(settings.animation != ""){
		sectionAttrs['data-uk-scrollspy'] = "cls:"+settings.animation+";repeat:false;";
		if(!_.isEmpty(settings.animationSelector )){
			sectionAttrs['data-target'] = settings.animationSelector;
		} else {
			sectionAttrs['data-target'] = "[data-uk-scrollspy-class]";
		}
		if(!_.isUndefined(settings.animationDelay )){
			sectionAttrs['data-delay'] = settings.animationDelay;
		}
	}
	if(settings.id != ""){
		sectionAttrs['id'] = settings.id;
	}
	if(settings.isSwitcher === "true" || settings.isSwitcher === true){
		sectionAttrs['data-uk-ef_section_switcher'] = "";
	}
	if( isImage ){
		if(settings.height != ""){
			backgroundAttrs["data-uk-height-viewport"] = contentBuilder.render.getViewportSettings(settings.height);
		}
		backgroundAttrs.class 	= _.union( backgroundAttrs.class, sectionClass );
		backgroundAttrs["data-uk-img"] = '';
		backgroundAttrs["data-src"] = bjb.endpoints.FILE_CLIENT+settings.image;

	} else {
		
		if(settings.height != ""){
			sectionAttrs["data-uk-height-viewport"] = contentBuilder.render.getViewportSettings(settings.height);
		}
		sectionAttrs.class = _.union( sectionAttrs.class, sectionClass );
	}
	%>
	<%if(isCustomBackground){
		sectionAttrs.style = "background:"+settings.customBackground+";";
	}%>
	<div <%=data._this.getAttr(sectionAttrs)%>>
		<%if(isImage){%>
			<div <%=data._this.getAttr(backgroundAttrs)%>>
		<%}%>

		<%if(isOverlay){%>
			<div class="uk-position-cover" style="background-color:<%=settings.backgroundOverlay !== "" ? settings.backgroundOverlay : "transparent"%>;"></div>
		<%}%>

		<%if(settings.height != ""){%>
			<div class="uk-width-1-1">
		<%}%>

		<%if(settings.container != "" || isOverlay){%>
				<div <%=data._this.getAttr(containerAttrs)%>>
		<%}%>
		<%
		_.each(data.rows, function(row){
		%>
			<%=data._this.render("row",row, ["columns","rowid","settings","dataTemplate"])%>
		<%})%>
		<%if(settings.container != "" || isOverlay){%>
			</div>
		<%}%>

		<%if(settings.height != ""){%>
			</div>
		<%}%>

		<%if(isImage){%>
			</div>
		<%}%>
	</div>
<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-row">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("agm_row")),
	marginClass = [
		settings.margin,
		settings.removeTopMargin ? 'uk-margin-remove-top' : '',
		settings.removeBottomMargin ? 'uk-margin-remove-bottom' : '',
	],
	containerAttr = {class: [ settings.container ] },
	gridAttr = {
		class: [
			settings.gutter,
			settings.divider ? 'uk-grid-divider' : '',
			settings.verticalAlignment,
			settings.matchHeight && _.isEmpty(settings.heightSelector) ? "uk-grid-match" : ""
		],
		'data-uk-grid':[],
		'data-uk-scrollspy-class':[]
	};
	if( settings.container != "" ){
		containerAttr['class'] = _.union( containerAttr['class'], marginClass );
	} else {
		gridAttr['class'] = _.union( gridAttr['class'], marginClass );
	}
	if(settings.height != ""){
		gridAttr["data-uk-height-viewport"] = contentBuilder.render.getViewportSettings(settings.height);
	}
	if(settings.matchHeight && !_.isEmpty(settings.heightSelector)){
		gridAttr["data-uk-height-match"] = "target:"+settings.heightSelector+";";
	}
%>
<%if(settings.container !== ""){%>
	<div <%=data._this.getAttr(containerAttr)%>>
<%}%>
	<div <%=data._this.getAttr(gridAttr)%>>
		<%
		_.each(data.columns, function(column){
		%>
			<%=data._this.render("column",column, ["items","columnid","settings", "width"])%>
		<%})%>
	</div>
<%if(settings.container !== ""){%>
	</div>
<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-column">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("agm_column")),
	isImage = settings.background == 'image' && settings.image !== "",
	isOverlay = ( settings.background == 'color' ) || ( isImage && settings.backgroundOverlay != "" );
var columnClass = [
	"uk-width-" + data.width + "@m",
	!_.isEmpty(settings.mobileWidth) ? settings.mobileWidth : "uk-width-1-1@s",
	( settings.style !== 'uk-tile-primary' && settings.style !== 'uk-tile-secondary' ? settings.textColor : '' ),
	( !isImage && settings.style != "" ? settings.verticalAlignment : '' ),
	settings.textAlignment,
	settings.horizontalAlignment
];
var containerAttrs	= { 
	class: [ 
		'uk-panel',
		settings.container,
		( isOverlay ? 'uk-position-relative' : '' )
	]
};
var columnAttrs = {
	class:columnClass
};
var tileAttrs = {
	class: [
		settings.style,
		( isOverlay ? 'uk-position-relative' : '' ),
		( ( ( settings.style == 'uk-tile-secondary' || settings.style == 'uk-tile-primary' ) && settings.preserveColor ) ? 'uk-preserve-color' : '' ),
	]
};
var backgroundAttrs	= { 
	class : [  
		"uk-tile",
		settings.padding,
		settings.verticalAlignment,
		( isImage ? settings.backgroundSize : '' ),
		( isImage ? settings.backgroundPosition : '' ),
		( isImage && settings.backgroundEffect == 'uk-background-fixed' ? settings.backgroundEffect : '' ),
		( isImage ? settings.backgroundVisibility : '' ),
	]
};

if( isImage ){
	backgroundAttrs["data-uk-img"] = '';
	backgroundAttrs["data-src"] = bjb.endpoints.FILE_CLIENT+settings.image;

} else {
	tileAttrs.class = _.union( tileAttrs.class, backgroundAttrs.class );
}
%>
	<div <%=data._this.getAttr(columnAttrs)%>>
		<%if(settings.style != ""){%>
			<div <%=data._this.getAttr(tileAttrs)%>>
		<%}%>
		<%if(isImage){%>
			<div <%=data._this.getAttr(backgroundAttrs)%>>
		<%}%>
		<%if(isOverlay){%>
			<div class="uk-position-cover" style="background-color:<%=settings.color !== "" ? settings.color : "transparent"%>;"></div>
		<%}%>
		<%if(settings.verticalAlignment != "" || isOverlay){%>
			<div <%=data._this.getAttr(containerAttrs)%>>
		<%}%>
			<%
			_.each(data.items, function(item){
			%>
				<%=data._this.render(item.name,item, ["settings","itemid"])%>
			<%})%>
		<%if(settings.verticalAlignment != "" || isOverlay){%>
			</div>
		<%}%>
		<%if(isImage){%>
			</div>
		<%}%>
		<%if(settings.style != ""){%>
			</div>
		<%}%>	
	</div>
</script>
    <script type="text/template" id="template-content-builder-render-loop">
    <%var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("loop"))%>
    <div>
        <%if(!_.isEmpty(settings.title) || !_.isEmpty(settings.text_link) || !_.isEmpty(settings.url_link)){%>
        <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-medium-bottom">
            <%if(!_.isEmpty(settings.title)){%>
                <h3 class="uk-margin-remove <%=settings.titleHeading%>"><%=settings.title%></h3>
            <%}%>
            <%if(!_.isEmpty(settings.text_link) || !_.isEmpty(settings.url_link) ){%>
                <a class="uk-button uk-button-text" href="<%=settings.url_link%>"><%=settings.text_link%></a>
            <%}%>
        </div>
        <%}%>
        <div data-uk-ef_blog_posts
            data-post-type="<%=settings.postType%>"
            data-limit="<%=settings.limit%>"
            data-is-pagination="<%=settings.isPagination%>"
            data-mode="<%=settings.postType == "asset" && settings.assetStyle != "" ? settings.assetStyle : settings.mode%>"
            data-column="<%=settings.column%>"
            data-categories="<%=settings.postCategory%>"
            data-tags="<%=settings.postTag%>"
            data-sort="<%=settings.sort%>"
            data-sort-type="<%=settings.sortType%>"
            data-asset-type="<%=settings.assetType%>"
        >
            <%if(settings.searchFilter === true){%>
                <div class="uk-margin-bottom uk-flex-middle uk-flex uk-grid-small" data-uk-grid>
            <%}%>
            <%if(settings.categoryFilter === true){%>
                <div class="<%=settings.searchFilter ? "uk-width-expand@m" : ""%>" data-uk-ef_term_filter=""
                    data-post-type="<%=settings.postType%>"
                    data-taxonomy="Category"
                    data-include="<%=settings.categoryFilterInclude%>"
                    data-exclude="<%=settings.categoryFilterExclude%>"
                    data-style="<%=settings.categoryFilterStyle%>"
                    data-title="<%=settings.categoryFilterTitle%>"
                    data-field="Categories"
                    data-disable-all-filter="<%=settings.disableAllFilter||false%>"
                    data-enable-bottom-divider="<%=settings.enableBottomDivider||false%>"
                ></div>
            <%}%>
            <%if(settings.tagFilter === true){%>
                <div class="<%=settings.searchFilter ? "uk-width-expand@m" : ""%>" data-uk-ef_term_filter=""
                    data-post-type="<%=settings.postType%>"
                    data-taxonomy="Tag"
                    data-include="<%=settings.tagFilterInclude%>"
                    data-exclude="<%=settings.tagFilterExclude%>"
                    data-style="<%=settings.tagFilterStyle%>"
                    data-title="<%=settings.tagFilterTitle%>"
                    data-field="Tags"
                    data-disable-all-filter="<%=settings.disableAllTagFilter||false%>"
                    data-enable-bottom-divider="<%=settings.enableTagBottomDivider||false%>"
                ></div>
            <%}%>
            <%if(settings.searchFilter === true){%>
                <div class="<%=settings.searchFilter ? "uk-width-auto@m" : ""%> uk-search uk-search-default">
                    <span class="uk-search-icon-flip" uk-search-icon></span>
                    <input class="uk-search-input ef-post-search" type="search" placeholder="Search" aria-label="Search" aria-label="Search">
                </div>
            <%}%>
            <%if(settings.searchFilter === true){%>
                </div>
            <%}%>
            <div class="blog-posts-content <%=settings.topMargin%> <%=settings.bottomMargin%>"></div>
        </div>
    </div>
</script>

    <script type="text/template" id="template-content-builder-render-loop_slider">
    <%
        var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("loop_slider")),
            useFlexBetween = ((!_.isEmpty(settings.text_link) || !_.isEmpty(settings.url_link)) && ( settings.categoryFilter === true || settings.tagFilter === true ) && settings.searchFilter === false) || settings.searchFilter === true;
    %>
    <div class="uk-container">
        <%if(!_.isEmpty(settings.title) || !_.isEmpty(settings.text_link) || !_.isEmpty(settings.url_link)){%>
        <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-medium-bottom">
            <%if(!_.isEmpty(settings.title)){%>
                <h3 class="uk-margin-remove-bottom <%=settings.titleHeading%>"><%=settings.title%></h3>
            <%}%>
            <%if((!_.isEmpty(settings.text_link) || !_.isEmpty(settings.url_link)) && ( settings.categoryFilter === false && settings.tagFilter === false ) && settings.searchFilter === true ){%>
                <a class="uk-button uk-button-text" href="<%=settings.url_link%>"><%=settings.text_link%></a>
            <%}%>
        </div>
        <%}%>
        <div data-uk-ef_blog_posts=""
            data-post-type="<%=settings.postType%>"
            data-limit="<%=settings.limit%>"
            data-is-pagination="false"
            data-mode="<%=settings.mode||"slider"%>"
            data-column="<%=settings.column%>"
            data-categories="<%=settings.postCategory%>"
            data-sort="<%=settings.sort%>"
            data-sort-type="<%=settings.sortType%>"
            data-asset-type="<%=settings.assetType%>"
        >
            <%if(useFlexBetween){%>
                <div class="uk-margin-bottom uk-flex-top uk-flex uk-grid-small" data-uk-grid>
            <%}%>
            <%if(settings.categoryFilter === true){%>
                <div class="<%=useFlexBetween ? "uk-width-expand@m" : ""%>" data-uk-ef_term_filter=""
                    data-post-type="<%=settings.postType%>"
                    data-taxonomy="Category"
                    data-include="<%=settings.categoryFilterInclude%>"
                    data-exclude="<%=settings.categoryFilterExclude%>"
                    data-style="<%=settings.categoryFilterStyle%>"
                    data-title="<%=settings.categoryFilterTitle%>"
                    data-field="Categories"
                    data-disable-all-filter="<%=settings.disableAllFilter||false%>"
                    data-enable-bottom-divider="<%=settings.enableBottomDivider||false%>"
                ></div>
            <%}%>
            <%if(settings.tagFilter === true){%>
                <div class="<%=useFlexBetween ? "uk-width-expand@m" : ""%>" data-uk-ef_term_filter=""
                    data-post-type="<%=settings.postType%>"
                    data-taxonomy="Tag"
                    data-include="<%=settings.tagFilterInclude%>"
                    data-exclude="<%=settings.tagFilterExclude%>"
                    data-style="<%=settings.tagFilterStyle%>"
                    data-title="<%=settings.tagFilterTitle%>"
                    data-field="Tags"
                    data-disable-all-filter="<%=settings.disableAllTagFilter||false%>"
                    data-enable-bottom-divider="<%=settings.enableTagBottomDivider||false%>"
                ></div>
            <%}%>
            <%if(settings.searchFilter === true){%>
                <div class="uk-search uk-search-default">
                    <span class="uk-search-icon-flip" uk-search-icon></span>
                    <input class="uk-search-input ef-post-search" type="search" placeholder="Search" aria-label="Search" aria-label="Search">
                </div>
            <%}%>
             <%if((!_.isEmpty(settings.text_link) || !_.isEmpty(settings.url_link)) && ( settings.categoryFilter === true || settings.tagFilter === true ) && settings.searchFilter === false ){%>
                <div class="uk-width-auto@m">
                    <a class="uk-button uk-button-text" href="<%=settings.url_link%>"><%=settings.text_link%></a>
                </div>
            <%}%>
            <%if(useFlexBetween){%>
                </div>
            <%}%>
            <div class="blog-posts-content"></div>
        </div>
    </div>
</script>


    <script type="text/template" id="template-content-builder-render-accordion">
    <% var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("accordion")); %>
    <%if(_.isEmpty(settings.style)){%>
        <ul uk-accordion>
            <%_.each(settings.accordion, function(accordion, i){%>
            <li class="<%=parseInt(i) === 0 ? "uk-open" : ""%>">
                <a class="uk-accordion-title" href="#"><%=accordion.title%></a>
                <div class="uk-accordion-content">
                    <%=accordion.contenteditor%>
                </div>
            </li>
            <%})%>
        </ul>
    <%} else {%>
        <ul class="uk-subnav-pill uk-grid-small ef-post-filter uk-flex uk-padding-remove uk-width-1-1" data-uk-grid>
            <%_.each(settings.accordion, function(accordion, i){%>
                <%settings.accordion[i].id = _.uniqueId('accordion' + _.now() + '');%>
                <li class="uk-tabnav__item"><a class="uk-subnav__link" href="#<%=settings.accordion[i].id%>" data-uk-ef_scroll><%=accordion.title%></a></li>
            <%})%>
        </ul>
        <hr/>
        <div>
            <div class="uk-grid-divider uk-child-width-1-1" data-uk-grid>
                <%_.each(settings.accordion, function(accordion, i){%>
                <div id="<%=accordion.id%>">
                    <h4><%=accordion.title%></h4>
                    <%=accordion.contenteditor%>
                </div>
                <%})%>
            </div>
        </div>
    <%}%>
</script>

    <script type="text/template" id="template-content-builder-render-loop_accordion">
    <% var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("loop_accordion")); %>
    <%if(_.isEmpty(settings.style)){%>
        <ul uk-accordion>
            <%_.each(settings.accordion, function(accordion){%>
            <li>
                <a class="uk-accordion-title" href="#"><%=bjb.getI81n(accordion.title, accordion.enTitle)%></a>
                <div class="uk-accordion-content">
                    <div data-uk-ef_blog_posts
                        data-post-type="<%=accordion.postType%>"
                        data-limit="<%=accordion.limit%>"
                        data-is-pagination="<%=accordion.isPagination%>"
                        data-mode="<%=accordion.mode%>"
                        data-column="<%=accordion.column%>"
                        data-categories="<%=accordion.postCategory%>"
                        data-sort="<%=settings.sort%>"
                        data-sort-type="<%=settings.sortType%>"
                        data-asset-type="<%=settings.assetType%>"
                    ></div>
                </div>
            </li>
            <%})%>
        </ul>
    <%} else {%>
        <div class="loop-accordion-sidenav-container" data-uk-grid>
            <div class="uk-width-1-3@m uk-visible@m">
                <div class="active-sticky-zero-z-index" uk-sticky="end: !.loop-accordion-sidenav-container;offset:100;media:@m">
                    <ul class="single-post-subnav uk-nav uk-nav-default" uk-switcher="connect:!.loop-accordion-sidenav-container .loop-accordion-sidenav-content;">
                        <%_.each(settings.accordion, function(accordion){%>
                        <li>
                            <a class="single-post-subnav-link" href="#"><span class="single-post-subnav-link-icon uk-margin-right"></span><%=accordion.title%></a>
                            <hr/>
                        </li>
                        <%})%>
                    </ul>
                </div>
            </div>
            <div class="uk-width-1-1 uk-hidden@m">
                <ul class="uk-flex-center" uk-tab="connect:connect:!.loop-accordion-sidenav-container .loop-accordion-sidenav-content;">
                    <%_.each(settings.accordion, function(accordion){%>
                    <li>
                        <a href="#"><%=accordion.title%></a>
                    </li>
                    <%})%>
                </ul>
            </div>
            <div class="uk-width-2-3@m">
                <ul class="uk-switcher loop-accordion-sidenav-content">
                    <%_.each(settings.accordion, function(accordion){%>
                    <li>
                        <h3 class="uk-margin-large-bottom"><%=accordion.title%></h3>
                        <div data-uk-ef_blog_posts
                            data-post-type="<%=accordion.postType%>"
                            data-limit="<%=accordion.limit%>"
                            data-is-pagination="<%=accordion.isPagination%>"
                            data-mode="<%=accordion.mode%>"
                            data-column="<%=accordion.column%>"
                            data-categories="<%=accordion.postCategory%>"
                            data-sort="<%=settings.sort%>"
                            data-sort-type="<%=settings.sortType%>"
                            data-asset-type="<%=settings.assetType%>"
                        ></div>
                    </li>
                    <%})%>
                </ul>
            </div>
        </div>
    <%}%>
</script>
    <script type="text/template" id="template-content-builder-render-text">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("text"));
%>
<div class="ef-text">
<%=settings.contenteditor%>
</div>
</script>
    <script type="text/template" id="template-content-builder-render-menu">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("menu"));
var menuId = "";
if(settings.menu!= ""){
	menuId = settings.menu.split("|")[0];
}
%>
<div class="uk-navbar-item nav-overlay">
	<div data-uk-ef_blog_menu="id:<%=menuId%>;"></div>
</div>	
</script>
    <script type="text/template" id="template-content-builder-render-block">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("block"));
var block = !_.isUndefined(settings.block) && settings.block != null ? settings.block.split("|")[0] : "";
%>
<div data-uk-ef_blog_post="post-type-slug:<%=_.escape(block)%>;post-type:Block;"></div>
</script>
    <script type="text/template" id="template-content-builder-render-block_toggle">
    <%var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("block_toggle"))%>
    <div class="ef-blocks-toggle-section-switcher">
        <ul class="uk-flex-center uk-tab" uk-switcher>
            <%_.each(settings.blocks, function(block){%>
            <li><a href="#"><%=block.title%></a></li>
            <%})%>
        </ul>
        <div class="uk-switcher">
            <%_.each(settings.blocks, function(block){%>
                <%
                var blockSlug = !_.isUndefined(block.block) && block.block != null ? block.block.split("|")[0] : "";
                %>
                <div data-uk-ef_blog_post="post-type-slug:<%=_.escape(blockSlug)%>;post-type:Block;"></div>
            <%})%>
        </div>
    </div>
</script>
    <script type="text/template" id="template-content-builder-render-logo">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("logo"));
%>
<div class="uk-navbar-item nav-overlay <%=!_.isEmpty(settings.stickyLogo) ? "is-sticky-logo" : ""%>">
	<%if(!_.isEmpty(settings.title)){%>
		<div class="uk-flex uk-flex-column uk-text-center">
			<span class="uk-text-secondary uk-text-bold" style="font-size:0.75rem;"><%=settings.title%></span>
			<%if(!settings.disableLink){%>
			<a href="<%=!_.isEmpty(settings.link) ? settings.link : bjb.baseURI%>">
			<%}%>
				<%if(!_.isEmpty(settings.stickyLogo)){%>
					<img class="sticky-logo" src="<%=bjb.endpoints.FILE_CLIENT%>/<%=settings.stickyLogo%>" width="<%=settings.width%>"/>
				<%}%>
				<img class="normal-logo" src="<%=bjb.endpoints.FILE_CLIENT%>/<%=settings.logo%>" width="<%=settings.width%>"/>
			<%if(!settings.disableLink){%>
			</a>
			<%}%>
		</div>
		
	<%} else {%>
		<%if(!settings.disableLink){%>
		<a href="<%=!_.isEmpty(settings.link) ? settings.link : bjb.baseURI%>">
		<%}%>
			<%if(!_.isEmpty(settings.stickyLogo)){%>
				<img class="sticky-logo" src="<%=bjb.endpoints.FILE_CLIENT%>/<%=settings.stickyLogo%>" width="<%=settings.width%>"/>
			<%}%>
			<img class="uk-flex-center normal-logo" src="<%=bjb.endpoints.FILE_CLIENT%>/<%=settings.logo%>" width="<%=settings.width%>"/>
		<%if(!settings.disableLink){%>
		</a>
		<%}%>
	<%}%>
</div>
</script>
    <script type="text/template" id="template-content-builder-render-posts">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("posts"));
%>
<div data-uk-ef_blog_posts="post-type:<%=settings.postType%>;limit:<%=settings.limit%>;is-pagination:<%=settings.isPagination%>;mode:<%=settings.mode%>;column:<%=settings.column%>;"
    data-sort="<%=settings.sort%>"
    data-sort-type="<%=settings.sortType%>"
    data-asset-type="<%=settings.assetType%>"
></div>
</script>

    <script type="text/template" id="template-content-builder-render-slider">

    <%
        var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("slider")),
            slideShowItemsAttrs = {
                class:[
                    "uk-slideshow-items"
                ]
            },
            slideShowAttrs = {
                class: [
                    "uk-position-relative uk-visible-toggle uk-light"
                ],
                "data-uk-slideshow":"",
                "data-animation" : "fade"
            }
        if( !settings.customRatio ){
            slideShowItemsAttrs["data-uk-height-viewport"] = contentBuilder.render.getViewportSettings(settings.height);
            slideShowAttrs["data-ratio"] = "false";
        } else {
            
            slideShowAttrs["data-ratio"] = settings.ratio;
        }
        
    %>

    <div <%=data._this.getAttr(slideShowAttrs)%>>

        <ul <%=data._this.getAttr(slideShowItemsAttrs)%>>
            <%_.each(settings.slider, function(slider){%>
            <%
                slider.imageTab = !_.isEmpty(slider.imageTab) ? slider.imageTab : slider.imageDesktop;
                slider.imageMobile = !_.isEmpty(slider.imageMobile) ? slider.imageMobile : slider.imageDesktop;
            %>
            <li class="uk-cover-container">
                <img data-src="<%=bjb.endpoints.FILE_CLIENT+"/"+slider.imageDesktop%>" alt="Slider Image Desktop" width="2600" height="800" class="uk-width-1-1 uk-visible@m" uk-img uk-cover/>
                <img data-src="<%=bjb.endpoints.FILE_CLIENT+"/"+slider.imageTab%>" alt="Slider Image Tablet" width="1600" height="600" class="uk-width-1-1 uk-visible@s uk-hidden@m" uk-img uk-cover/>
                <img data-src="<%=bjb.endpoints.FILE_CLIENT+"/"+slider.imageMobile%>" alt="Slider Image Mobile" class="uk-visible uk-hidden@s" uk-img uk-cover/>
                <%if(slider.text != ""){%>
                <div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 0%);"></div>
                <div class="uk-width-1-1 <%=slider.textPosition%> <%=slider.textPositionMargin%>">
                    <div class="uk-container">
                        <article class="uk-article uk-transition-slide-bottom">
                            <h4 class="uk-article-title"><%=slider.title%></h4>
                            <%=slider.text%>
                        </article>
                    </div>
                </div>
                <%}%>
            </li>
            <%})%>
        </ul>

        <div class=" uk-light">
            <a class="uk-position-center-left uk-position-large uk-slidenav-primary" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
            <a class="uk-position-center-right uk-position-large uk-slidenav-primary" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
        </div>
        <ul class="uk-position-bottom uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
    </div>
    
</script>
    <script type="text/template" id="template-content-builder-render-offcanvas">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("offcanvas"));
%>
  <a class="uk-navbar-toggle uk-background-primary uk-padding" href="#is-mobilenav" data-uk-toggle="" aria-expanded="false">
    <span class="uk-icon uk-navbar-toggle-icon open" data-uk-icon="icon:icon-menunav;ratio: 1.125;"></span>
    <span class="uk-icon uk-navbar-toggle-icon close" data-uk-icon="icon:icon-close;ratio: 1.125;"></span>
  </a>
</script>

    <script type="text/template" id="template-content-builder-render-cta_vertical">
    <% var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("cta_vertical")); %>
    <div class="cta-vertical uk-flex <%=settings.color%>">
        <div class="uk-border-rounded cta-vertical__icon">
            <a href="<%=settings.cta_url%>">
                <span data-uk-icon="icon:<%=settings.icon%>;ratio:1.5;"></span>
            </a>
        </div>
        <div class="cta-vertical__content uk-flex <%=settings.height%>">
             <a href="<%=settings.cta_url%>">
                <h4 class="uk-margin-remove"><%=settings.title%></h4>
            </a>
            <p><%=settings.text%></p>
            <a class="uk-margin-auto-top" href="<%=settings.cta_url%>"><%=settings.cta_text%> &rsaquo;</a>
        </div>
    </div>
</script>

    <script type="text/template" id="template-content-builder-render-cta_horizontal">
    <% var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("cta_vertical")); %>
    <div class="uk-text-center">
        <div class="<%=settings.color%> <%=settings.height%> uk-overflow-auto">
            <span data-uk-icon="<%=settings.icon%>"></span>
            <h3 class="uk-margin-remove-top"><%=settings.title%></h3>
            <p class=""><%=settings.text%></p>
        </div>
        <a class="uk-button uk-button-small uk-button-<%=settings.type%> uk-width-small uk-margin-top" href="<%=settings.cta_url%>"><%=settings.cta_text%></a>
    </div>
</script>
    <script type="text/template" id="template-content-builder-render-composite_link">
    <%
    var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("composite_link"));
    var menuId = "";
    if(settings.menu!= ""){
    menuId = settings.menu.split("|")[0];
    }
    %>
    <div data-uk-ef_composite_link class="uk-card uk-card-default uk-card-small uk-card-body uk-box-shadow-xlarge is-form-margin">
        <div class="uk-width-1-1">
            <p class="uk-text-bold uk-margin-remove-bottom is-emphasis-color">Cari Rencana</p>
        </div>
        <div class="uk-grid uk-grid-column-large uk-grid-row-small" data-uk-grid>
            <div class="uk-width-1-1 uk-width-expand@m">
                <form class="is-inline-form">
                    <h4 class="uk-margin-remove-bottom">Saya</h4>
                    <div class="uk-form-stacked uk-form-controls uk-form-large">
                        <select data-uk-ef_select class="uk-select ef-composite-link-parent" data-uk-ef_blog_menu="id:<%=menuId%>;mode:composite;"></select>
                    </div>
                </form>
            </div>
            <div class="uk-width-1-1 uk-width-expand@m">
                <form class="is-inline-form">
                    <h4 class="uk-margin-remove-bottom">Ingin</h4>
                    <div class="uk-form-stacked uk-form-controls uk-form-large">
                        <select data-uk-ef_select class="uk-select ef-composite-link-child"></select>
                    </div>
                </form>
            </div>
            <div class="uk-width-1-1 uk-width-auto@m uk-flex-center is-button-flex">
                <a href="#" class="uk-button uk-button-primary uk-width-small ef-composite-link-button">
                    Cari <span data-uk-icon="icon: icon-search-flip; ratio: .8;"></span>
                </a>
            </div>
        </div>
    </div>
</script>
    <script type="text/template" id="template-content-builder-render-search">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("search"));
%>
<div class="is-headertopbar-search nav-overlay">
    <a class="uk-icon is-headertopbar-search__trigger" href="#"  data-uk-search-icon="ratio: 1.5;" uk-toggle="mode:click;target: .nav-overlay; animation: uk-animation-fade"></a>
</div>

</script>
    <script type="text/template" id="template-content-builder-render-search_mobile">
    <%
    var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("search"));
    %>
    
    <a class="uk-navbar-toggle" href="#is-mobilesearch" data-uk-toggle="" aria-expanded="false">
        <div class="uk-icon uk-navbar-toggle-icon" data-uk-icon="icon:icon-search;"></div>
    </a>
    <div id="is-mobilesearch" class="uk-card uk-card-body uk-card-default" data-uk-drop="mode: click; boundary-x: !.uk-navbar;pos: bottom-justify;offset:1;stretch: x;delay-hide:50;animation: uk-animation-fade;">
    <!-- <div id="is-mobilesearch" class="uk-navbar-dropdown" data-uk-drop="mode: click; cls-drop: uk-navbar-dropdown; boundary: .is-headermobile > .uk-sticky; boundary-align: true; pos: bottom-justify; flip: x; animation: uk-animation-fade;stretch: x;"> -->

			<div class="uk-width-1-1">
                <form class="uk-search uk-search-default uk-width-1-1" action="<%=bjb.baseURI%>search">
                    <a href="" class="uk-search-icon" data-uk-icon="icon:icon-search;"></a>
                    <input class="uk-search-input uk-width-1-1" name="keyword" type="search" placeholder="Cari disini..." autofocus>
                </form>
            </div>
    </div>
</script>

    <script type="text/template" id="template-content-builder-render-toggle">
    <%var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("toggle"))%>
    <%if(_.isEmpty(settings.style)){%>
        <div class="uk-margin-medium-top ef-toggle-section-switcher">
            <ul class="uk-flex-center uk-tab" uk-switcher>
                <%_.each(settings.toggles, function(toggle){%>
                <li><a href="#"><%=toggle.text%></a></li>
                <%})%>
            </ul>
            <div class="uk-switcher ef-toggle-section-switcher-container">
            </div>
        </div>
    <%} else {%>
        <div class="loop-accordion-sidenav-container ef-toggle-section-switcher" data-uk-grid>
            <div class="uk-width-1-3@m uk-visible@m">
                <div class="active-sticky-zero-z-index" uk-sticky="end: !.loop-accordion-sidenav-container;offset:100;media:@m">
                    <ul class="single-post-subnav uk-nav uk-nav-default" uk-switcher="connect:!.loop-accordion-sidenav-container .ef-toggle-section-switcher-container;">
                        <%_.each(settings.toggles, function(toggle){%>
                        <li>
                            <a class="single-post-subnav-link" href="#"><span class="single-post-subnav-link-icon uk-margin-right"></span><%=toggle.text%></a>
                            <hr/>
                        </li>
                        <%})%>
                    </ul>
                </div>
            </div>
            <div class="uk-width-1-1 uk-hidden@m">
                <ul class="uk-subnav-pill uk-grid-small ef-post-filter uk-padding-remove uk-width-1-1" uk-switcher="connect:!.loop-accordion-sidenav-container .ef-toggle-section-switcher-container;" data-uk-grid>
                    <%_.each(settings.toggles, function(toggle){%>
                    <li class="uk-width-auto">
                        <a class="uk-subnav__link" href="#"><%=toggle.text%></a>
                    </li>
                    <%})%>
                </ul>
            </div>
            <div class="uk-width-2-3@m">
                <div class="uk-switcher ef-toggle-section-switcher-container">
                </div>
            </div>
        </div>
    <%}%>
</script>

    <script type="text/template" id="template-content-builder-render-galleries">
    <%var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("galleries"))%>
    <div class="">
        <div class="is-gallery <%=settings.ratio%> <%=settings.column%>" data-uk-grid data-uk-lightbox="animation: fade">
            <%_.each(settings.galleries, function(gallery){%>
            <div class="<%=gallery.column%>">
                <a tabindex="0" class="uk-inline uk-light uk-visible-toggle" href="<%=bjb.endpoints.FILE_CLIENT+"/"+gallery.image%>" data-caption="<%=gallery.caption%>">
                    <img src="<%=bjb.endpoints.FILE_CLIENT+"/"+gallery.image%>" alt="<%=gallery.caption%>" class="uk-width-1-1" uk-image />
                    <div class="uk-overlay-primary uk-position-cover uk-hidden-hover uk-transition-fade">
                        <div class="uk-position-center">
                            <span uk-overlay-icon ></span>
                        </div>
                    </div>
                </a>
            </div>
            <%})%>
        </div>
    </div>
</script>
    <script type="text/template" id="template-content-builder-render-simulasi_konsumer">
    <%var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("simulasi_konsumer"))%>
    <div data-uk-ef_simulasi_kredit>
        <div id="simulasi-kredit-perorangan" class="uk-child-width-1-2@m uk-grid-match" data-uk-grid data-uk-ef_simulasi_konsumer >
            <div>
                <form class="uk-form-stacked">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-select">Tipe Kredit Perorangan</label>
                        <div class="uk-form-controls">
                            <select data-uk-ef_select class="uk-select simulasi-konsumer simulasi-form cmb-produk">
                            </select>
                        </div>
                    </div>
                    <div class="uk-margin uk-hidden">
                        <label class="uk-form-label" for="form-stacked-select">Tipe Perhitungan</label>
                        <div class="uk-form-controls">
                            <select data-uk-ef_select class="uk-select simulasi-konsumer cmb-tipe-hitungan simulasi-form" id="form-stacked-select">
                                <option value="-">Pilih Tipe Perhitungan</option>
                                <option value="Anuitas" data-tahun="16.00">Anuitas Bulanan</option>
                                <option value="Sliding" data-tahun="18.00">Sliding/Efektif</option>
                                <option value="Flat" data-tahun="9.00">Flat</option>
                            </select>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Plafond Diajukan (Rp.)</label>
                        <div class="uk-form-controls">
                            <input class="uk-input simulasi-konsumer txt-platfond simulasi-form" type="text">
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Jangka Waktu (Tahun)</label>
                        <div class="uk-form-controls">
                            <span class="uk-text-muted txt-placeholder-jangka-waktu-range-value uk-width-1-1">-</span>
                            <input class="uk-range txt-placeholder-jangka-waktu simulasi-konsumer simulasi-form uk-margin" type="range" value="0" min="0" max="20" step="1" aria-label="Range"/>
                            <input class="uk-hidden uk-input txt-jangka-waktu simulasi-konsumer simulasi-form" type="text">
                            <select data-uk-ef_select class="uk-select uk-width-small simulasi-konsumer cmb-tipe-waktu simulasi-form uk-hidden">
                                <option value="tahun">Tahun</option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Bunga(%) / Tahun</label>
                        <select data-uk-ef_select class="uk-select uk-width-small simulasi-konsumer cmb-bunga-predefined uk-hidden">
                            <option value="">Pilih Bunga</option>
                            <option value="5">5</option>
                            <option value="7">7</option>
                            <option value="9">9</option>
                        </select>
                        <input class="uk-input simulasi-konsumer txt-bunga-tahun simulasi-form" type="text">
                    </div>
                    <div class="uk-margin uk-hidden">
                        <label class="uk-form-label" for="form-stacked-text">Bunga(%) / Bulan</label>
                        <div class="uk-form-controls">
                            <input class="uk-input simulasi-konsumer txt-bunga-bulan simulasi-form" type="text"  disabled>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label>
                            <input class="uk-checkbox simulasi-disclaimer-konsumer" type="checkbox">
                            Saya memahami bahwa hasil simulasi ini merupakan estimasi, hasil akhir sebenarnya dapat berbeda.
                        </label>
                    </div>
                </form>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-large uk-box-shadow-large">
                    <div class="uk-card-media-top uk-padding-small uk-background-primary">
                        <h3 class="uk-light uk-text-center uk-margin-remove-bottom">Hasil Penghitungan Simulasi</h3>
                    </div>
                    <div class="uk-card-body">
                        <div class="uk-flex uk-flex-column">
                            <span class="uk-text-default uk-width-1-1">Maksimal Limit Kredit yang diberikan</span>
                            <span class="simulasi-konsumer lbl-platfond uk-h4 uk-text-bold uk-margin-small-top">-</span>
                            <hr/>
                            <span class="uk-text-default uk-width-1-1">Angsuran Per bulan dari maksimal limit Kredit</span>
                            <span class="simulasi-konsumer lbl-angsuran-perbulan uk-h4 uk-text-bold uk-margin-small-top">-</span>
                            <hr/>
                            <div class="uk-flex uk-flex-between uk-flex-middle">
                                <div class="uk-flex uk-flex-column">
                                    <span class="uk-text-default uk-width-1-1">Jangka Waktu</span>
                                    <span class="simulasi-konsumer lbl-jangka-waktu uk-h4 uk-text-bold uk-margin-small-top">-</span>
                                </div>
                                <hr class="uk-divider-vertical"/>
                                <div class="uk-flex uk-flex-column">
                                    <span class="uk-text-default uk-width-1-1">Bunga (%) / Tahun</span>
                                    <span class="simulasi-konsumer lbl-bunga-tahun uk-h4 uk-text-bold uk-margin-small-top">-</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-card-footer">
                            <%=settings.content%>
                    </div>
                </div>
            </div>
        </div>
        <div id="simulasi-kredit-kpr" class="uk-hidden">
            <div id="simulasi-kpr-pembelian">
                <div class="uk-child-width-1-2@m uk-grid-match" data-uk-grid data-uk-ef_simulasi_kpr_pembelian>
                    <div>
                        <form class="uk-form-stacked">
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Tipe Kredit Perorangan</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select class="uk-select simulasi-konsumer simulasi-form cmb-produk">
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin uk-width-1-2@m">
                                <label class="uk-form-label">Tujuan Penggunaan Kredit</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select class="uk-select simulasi-pembelian simulasi-form cmb-tujuan-penggunaan-kredit">
                                        <option value="-">Pilih Salah Satu</option>
                                        <option value="pembelian">Pembelian</option>
                                        <option value="topup">Topup</option>
                                        <option value="multiguna">Multiguna</option>
                                        <option value="takeover">Take Over</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin uk-hidden">
                                <label class="uk-form-label" for="form-stacked-select">Jenis Rumah</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select class="uk-select simulasi-pembelian cmb-jenis simulasi-form" style="margin-left: 0px; width: 100%;">
                                        <!-- <option value="-">Pilih Jenis</option> -->
                                        <!-- <option value="Rumah Tapak">Rumah Tapak</option> -->
                                        <option value="Rumah Susun" selected>Rumah Susun (Apartemen)</option>
                                        <!-- <option value="Rumah Toko">Rumah Toko</option>
                                        <option value="Property Usaha">Property Usaha</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin kondisi-container">
                                <label class="uk-form-label" for="form-stacked-select">Pilih Jenis Agunan</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select class="uk-select simulasi-pembelian cmb-kondisi simulasi-form" style="margin-left: 0px; width: 100%;">
                                        <option value="-">Pilih Kondisi</option>
                                        <option value="Baru">bjb KPR Primary (Baru)</option>
                                        <option value="Bekas">bjb KPR Secondary (Bekas)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="jenis-pembiayaan-container uk-margin uk-hidden">
                                <label class="uk-form-label" for="form-stacked-select">Pilih Jenis Pembiayaan</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select class="uk-select simulasi-pembelian cmb-jenis-pembiayaan simulasi-form" style="margin-left: 0px; width: 100%;">
                                        <option value="non-subsidi" selected>Non Subsidi</option>
                                        <option value="subsidi">Subsidi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin uk-hidden">
                                <label class="uk-form-label" for="form-stacked-select">Profesi</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select class="uk-select simulasi-pembelian cmb-profesi simulasi-form" style="margin-left: 0px; width: 100%;">
                                        <!-- <option value="-">Pilih Profesi</option> -->
                                        <option value="Pegawai" selected>Pegawai</option>
                                        <!-- <option value="Profesional">Profesional</option>
                                        <option value="Wirausaha">Wirausaha</option> -->
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin uang-muka-container">
                                <label class="uk-form-label" for="form-stacked-select">Uang Muka</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select class="uk-select simulasi-pembelian cmb-luas-bangunan simulasi-form" style="margin-left: 0px; width: 100%;">
                                        <option value="-">Pilih Uang Muka</option>
                                        <option value="0">0%</option>
                                        <option value="5.00">5%</option>
                                        <option value="10.00">10%</option>
                                        <option value="15.00">15%</option>
                                        <option value="20.00">20%</option>
                                        <option value="25.00">25%</option>
                                        <option value="30.00">30%</option>
                                        <option value="35.00">35%</option>
                                        <option value="40.00">40%</option>
                                        <option value="45.00">45%</option>
                                        <option value="50.00">50%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Harga Rumah</label>
                                <div class="uk-form-controls">
                                    <input type="text" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" class="uk-input simulasi-pembelian txt-harga-rumah simulasi-form" style="margin-left: 0px; width: 100%;" inputmode="numeric">
                                </div>
                            </div>
                            <div class="uk-margin plafond-container uk-hidden">
                                <label class="uk-form-label" for="form-stacked-select">Plafond</label>
                                <div class="uk-form-controls">
                                    <input type="text" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" class="uk-input simulasi-pembelian txt-plafond simulasi-form" style="margin-left: 0px; width: 100%;" inputmode="numeric">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Jangka Waktu</label>
                                <div class="uk-form-controls">
                                    <span class="uk-text-muted txt-placeholder-jangka-waktu-range-value uk-width-1-1">-</span>
                                    <input class="uk-range txt-placeholder-jangka-waktu simulasi-pembelian simulasi-form uk-margin" type="range" value="0" min="0" max="25" step="1" aria-label="Range"/>
                                    <!-- <input class="uk-range xxx uk-margin" type="range" value="0" min="0" max="20" step="0.01" aria-label="Range"/> -->
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Bunga(%) / Tahun</label>
                                <div class="uk-form-controls">
                                    <input class="uk-input simulasi-pembelian txt-bunga-tahun simulasi-form" type="text">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label>
                                    <input class="uk-checkbox simulasi-disclaimer-kpr" type="checkbox">
                                    Saya memahami bahwa hasil simulasi ini merupakan estimasi, hasil akhir sebenarnya dapat berbeda.
                                </label>
                            </div>
                        </form>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-large uk-box-shadow-large">
                            <div class="uk-card-media-top uk-padding-small uk-background-primary">
                                    <h3 class="uk-light uk-text-center uk-margin-remove-bottom">Hasil Penghitungan Simulasi</h3>
                            </div>
                            <div class="uk-card-body">
                                <div class="uk-flex uk-flex-column">
                                    <span class="uk-text-default uk-width-1-1">Maksimal Limit Kredit yang diberikan</span>
                                    <span class="simulasi-pembelian lbl-maksimum-kredit uk-h4 uk-text-bold uk-margin-small-top">-</span>
                                    <hr/>
                                    <span class="uk-text-default uk-width-1-1">Angsuran Per bulan dari maksimal limit Kredit</span>
                                    <span class="simulasi-pembelian lbl-angsuran-kredit uk-h4 uk-text-bold uk-margin-small-top">-</span>
                                    <hr/>
                                    <div class="uk-flex uk-flex-between uk-flex-middle">
                                        <div class="uk-flex uk-flex-column">
                                            <span class="uk-text-default uk-width-1-1">Jangka Waktu</span>
                                            <span class="simulasi-pembelian lbl-jangka-waktu-kredit uk-h4 uk-text-bold uk-margin-small-top">-</span>
                                        </div>
                                        <hr class="uk-divider-vertical"/>
                                        <div class="uk-flex uk-flex-column">
                                            <span class="uk-text-default uk-width-1-1">Bunga (%) / Tahun</span>
                                            <span class="simulasi-pembelian lbl-bunga-kredit uk-h4 uk-text-bold uk-margin-small-top">-</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="uk-card-footer">
                                <%=settings.content%>
                            </div>
                        </div>
                        <!-- <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                            <h3 class="uk-card-title">Informasi Kredit</h3>
                            <table class="uk-table uk-table-hover uk-table-divider">
                                <tbody><tr>
                                    <td>
                                        <span class="simulasi-pembelian lbl-bunga-kredit-judul">Bunga Kredit  Fixed 2 Tahun</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-pembelian lbl-bunga-kredit">10%</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Minimum Uang Muka</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-pembelian lbl-uang-muka">-%</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Maksimum Kredit</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-pembelian lbl-maksimum-kredit">Rp. NaN</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Angsuran Kredit</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-pembelian lbl-angsuran-kredit">Rp. 0</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Minimum Penghasilan</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-pembelian lbl-minimum-penghasilan">Rp. 0</label>
                                    </td>
                                </tr>
                            </tbody></table>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</script>
    <script type="text/template" id="template-content-builder-render-simulasi_kpr">
    <%var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("simulasi_kpr"))%>
    <ul uk-accordion>
        <li class="uk-open">
            <a class="uk-accordion-title" href="#">Simulasi Pembelian</a>
            <div class="uk-accordion-content">
                <div class="uk-child-width-1-2@m uk-grid-match" data-uk-grid data-uk-ef_simulasi_kpr_pembelian>
                    <div>
                        <form class="uk-form-stacked">

                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Jenis Rumah</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select class="uk-select simulasi-pembelian cmb-jenis simulasi-form" style="margin-left: 0px; width: 100%;">
                                        <option value="-">Pilih Jenis</option>
                                        <option value="Rumah Tapak">Rumah Tapak</option>
                                        <option value="Rumah Susun">Rumah Susun (Apartemen)</option>
                                        <option value="Rumah Toko">Rumah Toko</option>
                                        <option value="Property Usaha">Property Usaha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Kondisi Rumah</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select class="uk-select simulasi-pembelian cmb-kondisi simulasi-form" style="margin-left: 0px; width: 100%;">
                                        <option value="-">Pilih Kondisi</option>
                                        <option value="Baru">Baru</option>
                                        <option value="Bekas">Bekas</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Profesi</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select class="uk-select simulasi-pembelian cmb-profesi simulasi-form" style="margin-left: 0px; width: 100%;">
                                        <option value="-">Pilih Profesi</option>
                                        <option value="Pegawai">Pegawai</option>
                                        <option value="Profesional">Profesional</option>
                                        <option value="Wirausaha">Wirausaha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Jangka Waktu</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select class="uk-select simulasi-pembelian cmb-jangka-waktu-kredit simulasi-form" style="margin-left: 0px; width: 100%;">
                                        <option value="-">Pilih Jangka Waktu</option>
                                        <option value="12">1 Tahun</option>
                                        <option value="24">2 Tahun</option>
                                        <option value="36">3 Tahun</option>
                                        <option value="48">4 Tahun</option>
                                        <option value="60">5 Tahun</option>
                                        <option value="72">6 Tahun</option>
                                        <option value="84">7 Tahun</option>
                                        <option value="96">8 Tahun</option>
                                        <option value="108">9 Tahun</option>
                                        <option value="120">10 Tahun</option>
                                        <option value="132">11 Tahun</option>
                                        <option value="144">12 Tahun</option>
                                        <option value="156">13 Tahun</option>
                                        <option value="168">14 Tahun</option>
                                        <option value="180">15 Tahun</option>
                                        <option value="192">16 Tahun</option>
                                        <option value="204">17 Tahun</option>
                                        <option value="216">18 Tahun</option>
                                        <option value="228">19 Tahun</option>
                                        <option value="240">20 Tahun</option>
                                        <option value="252">21 Tahun</option>
                                        <option value="264">22 Tahun</option>
                                        <option value="276">23 Tahun</option>
                                        <option value="288">24 Tahun</option>
                                        <option value="300">25 Tahun</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Uang Muka</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select class="uk-select simulasi-pembelian cmb-luas-bangunan simulasi-form" style="margin-left: 0px; width: 100%;">
                                        <option value="-">Pilih Uang Muka</option>
                                        <option value="0">0%</option>
                                        <option value="5.00">5%</option>
                                        <option value="10.00">10%</option>
                                        <option value="15.00">15%</option>
                                        <option value="20.00">20%</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Harga Rumah</label>
                                <div class="uk-form-controls">
                                    <input type="text" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" class="uk-input simulasi-pembelian txt-harga-rumah simulasi-form" style="margin-left: 0px; width: 100%;" inputmode="numeric">
                                </div>
                            </div>

                        </form>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                            <h3 class="uk-card-title">Informasi Kredit</h3>
                            <table class="uk-table uk-table-hover uk-table-divider">
                                <tbody><tr>
                                    <td>
                                        <span class="simulasi-pembelian lbl-bunga-kredit-judul">Bunga Kredit  Fixed 2 Tahun</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-pembelian lbl-bunga-kredit">10%</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Minimum Uang Muka</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-pembelian lbl-uang-muka">-%</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Maksimum Kredit</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-pembelian lbl-maksimum-kredit">Rp. NaN</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Angsuran Kredit</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-pembelian lbl-angsuran-kredit">Rp. 0</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span>Minimum Penghasilan</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-pembelian lbl-minimum-penghasilan">Rp. 0</label>
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a class="uk-accordion-title" href="#">Simulasi Pembelian Subsidi (FLPP)</a>
            <div class="uk-accordion-content">
                <div class="uk-child-width-1-2@m uk-grid-match" data-uk-grid data-uk-ef_simulasi_kpr_pembelian_subsidi>
                    <div>
                        <form class="uk-form-stacked">

                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Profesi</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select class="uk-select simulasi-subsidi cmb-profesi simulasi-form" style="margin-left: 0px; width: 100%;">
                                        <option value="-">Pilih Profesi</option>
                                        <option value="Pegawai">Pegawai</option>
                                        <option value="Profesional">Profesional</option>
                                        <option value="Wirausaha">Wirausaha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Jangka Waktu</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select class="uk-select simulasi-subsidi cmb-jangka-waktu-kredit simulasi-form" style="margin-left: 0px; width: 100%;">
                                        <option value="-">Pilih Jangka Waktu</option>
                                        <option value="12">12 Bulan</option>
                                        <option value="24">24 Bulan</option>
                                        <option value="36">36 Bulan</option>
                                        <option value="48">48 Bulan</option>
                                        <option value="60">60 Bulan</option>
                                        <option value="72">72 Bulan</option>
                                        <option value="84">84 Bulan</option>
                                        <option value="96">96 Bulan</option>
                                        <option value="108">108 Bulan</option>
                                        <option value="120">120 Bulan</option>
                                        <option value="132">132 Bulan</option>
                                        <option value="144">144 Bulan</option>
                                        <option value="156">156 Bulan</option>
                                        <option value="168">168 Bulan</option>
                                        <option value="180">180 Bulan</option>
                                        <option value="192">192 Bulan</option>
                                        <option value="204">204 Bulan</option>
                                        <option value="216">216 Bulan</option>
                                        <option value="228">228 Bulan</option>
                                        <option value="240">240 Bulan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Daerah Rumah</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select name="ctl00$ContentPlaceHolder1$cmbDaerahRumah" id="ContentPlaceHolder1_cmbDaerahRumah" class="uk-select simulasi-subsidi cmb-daerah simulasi-form" style="margin-left: 0px; width: 100%;">
                                        <option selected="selected" value="-" disabled="disabled">Pilih Daerah</option>
                                        <option value=" 150500000 ">Jawa (Kec Jabodetabek)</option>
                                        <option value=" 150500000 ">Sumatra (Kec Kepri, Babel, Kep Mentawai)</option>
                                        <option value=" 164500000">Sulawesi</option>
                                        <option value=" 164500000">Babel</option>
                                        <option value=" 164500000">Kepulauan Mentawai</option>
                                        <option value=" 164500000">Kepulauan Riau</option>
                                        <option value=" 168000000 ">Maluku dan Maluku Utara</option>
                                        <option value=" 168000000">Bali</option>
                                        <option value=" 168000000">Nusa Tenggara</option>
                                        <option value=" 168000000">Jabodetabek</option>
                                        <option value=" 168000000">Kepulauan Anambas</option>
                                        <option value=" 168000000">Kabupaten Murung Raya</option>
                                        <option value=" 168000000">Kabupaten Mahakam Ulu</option>
                                        <option value=" 219000000 ">Papua dan Papua Barat</option>

                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Harga Rumah</label>
                                <div class="uk-form-controls">
                                    <input type="text" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" class="uk-input simulasi-subsidi txt-harga-rumah simulasi-form" style="margin-left: 0px; width: 100%;" readonly="">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                            <h3 class="uk-card-title">Informasi Kredit</h3>
                            <table class="uk-table uk-table-hover uk-table-divider" style="margin-bottom: 0px;">
                                <tbody><tr>
                                    <td>
                                        <span style="font-weight: bold; font-size: 12px;">Jenis Rumah</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-subsidi lbl-jenis-rumah" style="font-size: 15px; margin-bottom: 0px;">Rumah Tapak</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-weight: bold; font-size: 12px;">Bunga Kredit</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-subsidi lbl-bunga-kredit" style="font-size: 15px; margin-bottom: 0px;">5.00%</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-weight: bold; font-size: 12px;">Minimum Uang Muka</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-subsidi lbl-uang-muka" style="font-size: 15px; margin-bottom: 0px;">5.00%</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-weight: bold; font-size: 12px;">Maksimum Kredit</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-subsidi lbl-maksimum-kredit" style="font-size: 15px; margin-bottom: 0px;">-</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-weight: bold; font-size: 12px;">Angsuran Kredit</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-subsidi lbl-angsuran-kredit" style="font-size: 15px; margin-bottom: 0px;">-</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-weight: bold; font-size: 12px;">Minimum Penghasilan</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-subsidi lbl-minimum-penghasilan" style="font-size: 15px; margin-bottom: 0px;">-</label>
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div>
                </div>
            </div>
        </li>
        <li>
            <a class="uk-accordion-title" href="#">Simulasi Take Over Xtra</a>
            <div class="uk-accordion-content">
                <div class="uk-child-width-1-2@m uk-grid-match" data-uk-grid data-uk-ef_simulasi_kpr_takeover>
                    <div>
                        <form class="uk-form-stacked">

                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Jenis Rumah</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select class="uk-select simulasi-takeover cmb-jenis simulasi-form" style="margin-left: 0px; width: 100%;">
                                        <option value="-">Pilih Jenis</option>
                                        <option value="Rumah Tapak">Rumah Tapak</option>
                                        <option value="Rumah Susun">Rumah Susun (Apartemen)</option>
                                        <option value="Rumah Toko">Rumah Toko</option>
                                        <option value="Property Usaha">Property Usaha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Profesi</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select class="uk-select simulasi-takeover cmb-profesi simulasi-form" style="margin-left: 0px; width: 100%;">
                                        <option value="-">Pilih Profesi</option>
                                        <option value="Pegawai">Pegawai</option>
                                        <option value="Profesional">Profesional</option>
                                        <option value="Wirausaha">Wirausaha</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Jangka Waktu</label>
                                <div class="uk-form-controls">
                                    <select data-uk-ef_select class="uk-select simulasi-takeover cmb-jangka-waktu-kredit simulasi-form" style="margin-left: 0px; width: 100%;">
                                        <option value="-">Pilih Jangka Waktu</option>
                                        <option value="12">1 Tahun</option>
                                        <option value="24">2 Tahun</option>
                                        <option value="36">3 Tahun</option>
                                        <option value="48">4 Tahun</option>
                                        <option value="60">5 Tahun</option>
                                        <option value="72">6 Tahun</option>
                                        <option value="84">7 Tahun</option>
                                        <option value="96">8 Tahun</option>
                                        <option value="108">9 Tahun</option>
                                        <option value="120">10 Tahun</option>
                                        <option value="132">11 Tahun</option>
                                        <option value="144">12 Tahun</option>
                                        <option value="156">13 Tahun</option>
                                        <option value="168">14 Tahun</option>
                                        <option value="180">15 Tahun</option>
                                        <option value="192" style="display: none;">16 Tahun</option>
                                        <option value="204" style="display: none;">17 Tahun</option>
                                        <option value="216" style="display: none;">18 Tahun</option>
                                        <option value="228" style="display: none;">19 Tahun</option>
                                        <option value="240" style="display: none;">20 Tahun</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-select">Penghasilan</label>
                                <div class="uk-form-controls">
                                    <input type="text" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" class="uk-input simulasi-takeover txt-penghasilan simulasi-form" style="margin-left: 0px; width: 100%;" inputmode="numeric">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div>
                        <div class="uk-card uk-card-default uk-card-hover uk-card-body">
                            <h3 class="uk-card-title">Informasi Kredit</h3>
                            <table class="uk-table uk-table-hover uk-table-divider" style="margin-bottom: 0px;">
                                <tbody><tr>
                                    <td>
                                        <span class="simulasi-takeover lbl-bunga-kredit-judul" style="font-weight: bold; font-size: 12px;">Bunga Kredit Fixed 3 Tahun</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-takeover lbl-bunga-kredit" style="font-size: 15px; margin-bottom: 0px;"></label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-weight: bold; font-size: 12px;">Maksimum Kredit</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-takeover lbl-maksimum-kredit" style="font-size: 15px; margin-bottom: 0px;">-</label>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <span style="font-weight: bold; font-size: 12px;">Angsuran Kredit</span>
                                    </td>
                                    <td class="text-right">
                                        <label class="simulasi-takeover lbl-angsuran-kredit" style="font-size: 15px; margin-bottom: 0px;">-</label>
                                    </td>
                                </tr>
                            </tbody></table>
                        </div>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</script>
    <script type="text/template" id="template-content-builder-render-simulasi_dplk">
    <%var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("simulasi_dplk"))%>
    <div class="uk-child-width-1-2@m" data-uk-ef_simulasi_dplk data-uk-grid>
        <div>
            <div class="uk-margin">
                <label class="uk-form-label" for="form-stacked-select">Produk Simpanan</label>
                <div class="uk-form-controls">
                    <select class="uk-select simulasi-simpanan-perorangan product-simpanan uk-margin-bottom"></select>
                </div>
            </div>
            <form class="uk-form-stacked uk-hidden simulasi-simpanan-perorangan-form" data-product-simpanan="DPLK">
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-select">Usia Saat Ini</label>
                    <div class="uk-form-controls">
                        <input type="text" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" class="uk-input simulasi-dplk txt-usia-sekarang simulasi-form" style="margin-left: 0px; width: 100%;" inputmode="numeric">
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-select">Usia Pensium</label>
                    <div class="uk-form-controls">
                        <input type="text" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" class="uk-input simulasi-dplk txt-usia-pensiun simulasi-form" style="margin-left: 0px; width: 100%;" inputmode="numeric">
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-select">Setoran Awal</label>
                    <div class="uk-form-controls">
                        <input type="text" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" class="uk-input simulasi-dplk txt-setoran-awal simulasi-form" style="margin-left: 0px; width: 100%;" inputmode="numeric">
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-select">Iuran Rutin</label>
                    <div class="uk-form-controls">
                        <input type="text" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" class="uk-input simulasi-dplk txt-iuran-rutin simulasi-form" style="margin-left: 0px; width: 100%;" inputmode="numeric">
                    </div>
                </div>
                <div class="uk-margin">
                    <label class="uk-form-label" for="form-stacked-select">Frekuensi Iuran</label>
                    <div class="uk-form-controls">
                        <select data-uk-ef_select class="uk-select simulasi-dplk cmb-frekuensi-iuran simulasi-form" style="margin-left: 0px; width: 100%;">
                            <option value="tunggal">Tunggal</option>
                            <option value="bulan">Per-Bulan</option>
                            <option value="triwulan">Per-Triwulan</option>
                            <option value="semester">Per-Semester</option>
                            <option value="tahun">Per-Tahun</option>
                        </select>
                    </div>
                </div>

            </form>
        </div>
        <div>
            <div class="uk-card uk-card-default uk-card-large uk-box-shadow-large uk-hidden simulasi-simpanan-perorangan-form" data-product-simpanan="DPLK">
                <div class="uk-card-media-top uk-padding-small uk-background-primary">
                    <h3 class="uk-light uk-text-center uk-margin-remove-bottom">Hasil Penghitungan Simulasi</h3>
                </div>
                <div class="uk-card-body">
                    <div class="uk-flex uk-flex-column">
                        <span class="uk-text-default uk-width-1-1">Total Dana</span>
                        <span class="simulasi-dplk lbl-total-dana uk-h4 uk-text-bold uk-margin-small-top">-</span>
                        <hr/>
                        <span class="uk-text-default uk-width-1-1">Biaya Pajak</span>
                        <span class="simulasi-dplk lbl-biaya-pajak uk-h4 uk-text-bold uk-margin-small-top">-</span>
                        <hr/>
                        <span class="uk-text-default uk-width-1-1">Total yang Dibayarkan</span>
                        <span class="simulasi-dplk lbl-total-dibayarkan uk-h4 uk-text-bold uk-margin-small-top">-</span>
                        <hr/>
                        <span class="uk-text-default uk-width-1-1">Tingkat Pengembangan</span>
                        <span class="simulasi-dplk lbl-tingkat-pengembangan uk-h4 uk-text-bold uk-margin-small-top">5%</span>
                        <hr/>
                        <div class="uk-flex uk-flex-between uk-flex-middle">
                            <div class="uk-flex uk-flex-column">
                                <span class="uk-text-default uk-width-1-1">Biaya Administrasi</span>
                                <span class="simulasi-konsumer lbl-jangka-waktu uk-h4 uk-text-bold uk-margin-small-top">Rp.825/bulan</span>
                            </div>
                            <hr class="uk-divider-vertical"/>
                            <div class="uk-flex uk-flex-column">
                                <span class="uk-text-default uk-width-1-1">Biaya Pengelolaan</span>
                                <span class="simulasi-dplk lbl-biaya-pengelolaan uk-h4 uk-text-bolder uk-margin-small-top">1.2%/tahun</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-card-footer">
                    <p class="uk-text-small">Kepersertaan dan iuran rutin dimulai dari bulan Januari </p>
                </div>
            </div>
        </div>
        <div class="uk-width-1-1">
            <ul uk-accordion>
                <li>
                    <a class="uk-accordion-title" href="#">Tabel Informasi Dana Iuran dan Pengembangan</a>
                    <div class="uk-accordion-content">
                        <div class="uk-width-1-1 uk-overflow-auto">
                            <table class="uk-table uk-table-hover">
                                <thead>
                                    <tr style="background-color:#194e7d;">
                                        <th>
                                            <strong>Tahun Ke-</strong>
                                        </th>
                                        <th>
                                            <strong>Iuran</strong>
                                        </th>
                                        <th>
                                            <strong>Pengembangan</strong>
                                        </th>
                                        <th>
                                            <strong>Dana</strong>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="dplk-rincian">
                                    <tr>
                                        <td>
                                            <strong>-</strong>
                                        </td>
                                        <td>
                                            <strong>-</strong>
                                        </td>
                                        <td>
                                            <strong>-</strong>
                                        </td>
                                        <td>
                                            <strong>-</strong>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div id="dplk-pagination" class="uk-margin"></div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</script>
    <script type="text/template" id="template-content-builder-render-simulasi_non_perorangan">
    <%var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("simulasi_konsumer"))%>
    <div data-uk-ef_simulasi_kredit>
        <div id="simulasi-kredit-perorangan" class="uk-child-width-1-2@m uk-grid-match" data-uk-grid data-uk-ef_simulasi_non_perorangan >
            <div>
                <form class="uk-form-stacked">
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-select">Tipe Kredit Perorangan</label>
                        <div class="uk-form-controls">
                            <select data-uk-ef_select class="uk-select simulasi-non-perorangan simulasi-form cmb-produk">
                            </select>
                        </div>
                    </div>
                    <div class="uk-margin uk-hidden">
                        <label class="uk-form-label" for="form-stacked-select">Tipe Perhitungan</label>
                        <div class="uk-form-controls">
                            <select data-uk-ef_select class="uk-select simulasi-non-perorangan cmb-tipe-hitungan simulasi-form" id="form-stacked-select">
                                <option value="-">Pilih Tipe Perhitungan</option>
                                <option value="Anuitas" data-tahun="16.00">Anuitas Bulanan</option>
                                <option value="Sliding" data-tahun="18.00">Sliding/Efektif</option>
                                <option value="Flat" data-tahun="9.00">Flat</option>
                            </select>
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Plafond Diajukan (Rp.)</label>
                        <div class="uk-form-controls">
                            <input class="uk-input simulasi-non-perorangan txt-platfond simulasi-form" type="text">
                        </div>
                    </div>

                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Jangka Waktu (Tahun)</label>
                        <div class="uk-form-controls">
                            <span class="uk-text-muted txt-placeholder-jangka-waktu-range-value uk-width-1-1">-</span>
                            <input class="uk-range txt-placeholder-jangka-waktu simulasi-non-perorangan simulasi-form uk-margin" type="range" value="0" min="0" max="20" step="1" aria-label="Range"/>
                            <input class="uk-hidden uk-input txt-jangka-waktu simulasi-non-perorangan simulasi-form" type="text">
                            <select data-uk-ef_select class="uk-select uk-width-small simulasi-non-perorangan cmb-tipe-waktu simulasi-form uk-hidden">
                                <option value="tahun">Tahun</option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label class="uk-form-label" for="form-stacked-text">Bunga(%) / Tahun</label>
                        <select data-uk-ef_select class="uk-select uk-width-small simulasi-non-perorangan cmb-bunga-predefined uk-hidden">
                            <option value="">Pilih Bunga</option>
                            <option value="5">5</option>
                            <option value="7">7</option>
                            <option value="9">9</option>
                        </select>
                        <input class="uk-input simulasi-non-perorangan txt-bunga-tahun simulasi-form" type="text">
                    </div>
                    <div class="uk-margin uk-hidden">
                        <label class="uk-form-label" for="form-stacked-text">Bunga(%) / Bulan</label>
                        <div class="uk-form-controls">
                            <input class="uk-input simulasi-non-perorangan txt-bunga-bulan simulasi-form" type="text"  disabled>
                        </div>
                    </div>
                    <div class="uk-margin">
                        <label>
                            <input class="uk-checkbox simulasi-disclaimer-kredit" type="checkbox">
                            Saya memahami bahwa hasil simulasi ini merupakan estimasi, hasil akhir sebenarnya dapat berbeda.
                        </label>
                    </div>
                    <div class="uk-flex uk-flex-right uk-width-1-1">
                        <button title="calculate" class="uk-button uk-button-primary simulasi-non-perorangan btn-hitung" type="button">Hitung</button>
                    </div>
                </form>
            </div>
            <div>
                <div class="uk-card uk-card-default uk-card-large uk-box-shadow-large">
                    <div class="uk-card-media-top uk-padding-small uk-background-primary">
                        <h3 class="uk-light uk-text-center uk-margin-remove-bottom">Hasil Penghitungan Simulasi</h3>
                    </div>
                    <div class="uk-card-body">
                        <div class="uk-flex uk-flex-column">
                            <span class="uk-text-default uk-width-1-1">Plafond</span>
                            <span class="simulasi-non-perorangan lbl-platfond uk-h4 uk-text-bold uk-margin-small-top">-</span>
                            <hr/>
                            <div class="uk-flex uk-flex-between uk-flex-middle">
                                <div class="uk-flex uk-flex-column">
                                    <span class="uk-text-default uk-width-1-1">Jangka Waktu</span>
                                    <span class="simulasi-non-perorangan lbl-jangka-waktu uk-h4 uk-text-bold uk-margin-small-top">-</span>
                                </div>
                                <hr class="uk-divider-vertical"/>
                                <div class="uk-flex uk-flex-column">
                                    <span class="uk-text-default uk-width-1-1">Angsuran</span>
                                    <span class="simulasi-non-perorangan lbl-angsuran-perbulan uk-margin-small-top uk-margin-bottom uk-text-bold uk-margin-small-top">
                                        <a href="#simulasi-non-perorangan-tabel-angsuran" data-uk-ef_scroll>Lihat Tabel Angsuran</a>
                                    </span>
                                </div>
                            </div>
                            <hr/>
                            <div class="uk-flex uk-flex-between uk-flex-middle">
                                <div class="uk-flex uk-flex-column">
                                    <span class="uk-text-default uk-width-1-1">Bunga (%) Flat</span>
                                    <span class="simulasi-non-perorangan lbl-bunga-flat uk-h4 uk-text-bold uk-margin-small-top">-</span>
                                </div>
                                <hr class="uk-divider-vertical"/>
                                <div class="uk-flex uk-flex-column">
                                    <span class="uk-text-default uk-width-1-1">Bunga (%) / Tahun</span>
                                    <span class="simulasi-non-perorangan lbl-bunga-tahun uk-h4 uk-text-bold uk-margin-small-top">-</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-card-footer">
                            <%=settings.content%>
                    </div>
                </div>
            </div>
            <div class="uk-width-1-1 simulasi-non-perorangan tabel-angsuran" id="simulasi-non-perorangan-tabel-angsuran">

            </div>
        </div>
    </div>
</script>
    <script type="text/template" id="template-content-builder-render-simulasi-non-perorangan-tabel-angsuran">
	<%
		var itemGroupedByYears = _.groupBy(data.items, function(item, index){
			 return Math.floor(index/12);
		});
	%>
	<ul uk-accordion>
		<%_.each(itemGroupedByYears, function(items, year){%>
			<li>
				<a class="uk-accordion-title" href="#">Tahun <%=(parseInt(year)+1)%></a>
				<div class="uk-accordion-content">
					<div class="uk-overflow-auto">
						<table class="uk-table">
							<thead>
								<tr>
									<th colspan="4">Angsuran</th>
									<th rowspan="2">Sisa Pokok Pinjaman</th>
								</tr>
								<tr>
									<th>Ke</th>
									<th>Pokok</th>
									<th>Bunga</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<%_.each(items, function(item, index){%>
									<tr align="right">
										<td><%=(index+1)%></td>
										<td><%=item.pokok.toLocaleString('en-US')%></td>
										<td><%=item.bunga.toLocaleString('en-US')%></td>
										<td><%=item.total.toLocaleString('en-US')%></td>
										<td><%=item.sisa.toLocaleString('en-US')%></td>
									</tr>
								<%});%>
							</tbody>
						</table>
					</div>
				</div>
			</li>
		<%});%>
	</ul>
</script>
    <script type="text/template" id="template-content-builder-render-kurs">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("kurs"));
%>
<div data-uk-ef_kurs 
    data-special-last-updated-date="<%=settings.specialLastUpdateDate%>"
    data-special-last-updated-time="<%=settings.specialLastUpdateTime%>"
></div>
</script>
    <script type="text/template" id="template-content-builder-render-kurs_calculator">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("kurs_calculator"));
%>
<div data-uk-ef_kurs_calculator 
    data-special-last-updated-date="<%=settings.specialLastUpdateDate%>"
    data-counter-last-updated-date="<%=settings.counterLastUpdateDate%>"
    data-bank-notes-last-updated-date="<%=settings.bankNotesLastUpdateDate%>"
    data-special-last-updated-time="<%=settings.specialLastUpdateTime%>"
    data-counter-last-updated-time="<%=settings.counterLastUpdateTime%>"
    data-bank-notes-last-updated-time="<%=settings.bankNotesLastUpdateTime%>"
></div>
</script>
    <script type="text/template" id="template-content-builder-render-google_translate">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("google_translate"));
%>
<div class="uk-flex uk-flex-wrap-around" data-uk-ef_google_translate id="ef-google-translate">
    <div class="uk-hidden" id="ef-google-translate-switcher"></div>
    <ul class="uk-flex uk-background-default uk-padding-remove uk-margin-remove uk-overflow-hidden uk-text-bold translate-languages">
        <li data-lang="/id/en">
            <a href="#" class="uk-link" data-value="en">EN</a>
        </li>
        <li data-lang="/id/id">
            <a href="#" class="uk-link" data-value="id">ID</a>
        </li>
    </ul>
</div>
</script>
    <script type="text/template" id="template-content-builder-render-local_search">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("google_translate"));
%>
<div class='col-lg-12' uk-ef_module="name:lokasi;" id="pnlData">
    <div class="uk-container">
        <div class="uk-card uk-card-body uk-width-1-1">
            <div class="uk-flex uk-flex-wrap-around">
                <div class="form-group dropbox bx-f1 form-peta uk-width-expand">
                    <i class="down-arrow down-map-arrow" style="z-index: 999"></i>
                    <select data-uk-ef_select class="uk-select simple-select2-sm cabang form1" id="cmbJenis">
                        <option value="all">Seluruh</option>
                        <option value="bpr emas Kantor Wilayah">Kantor Wilayah</option>
                        <option value="bpr emas Kantor Cabang">Kantor Cabang</option>
                        <option value="bpr emas Kantor Cabang Pembantu">Kantor Cabang Pembantu</option>

                        <option value="ATM bpr emas">ATM bjb</option>
                    </select>
                </div>

                <div class="form-group dropbox bx-f1 form-peta uk-width-expand" style="margin-bottom: 0px;">
                    <i class="down-arrow down-map-arrow d-none" style="z-index: 999"></i>

                    <input type="text" id="txtvalue" class="uk-input  form1 " value="Masukkan Kata Kunci" onkeypress="return handleEnter('mapcari',event);">
                </div>
                <button role="button" data-toggle="button" class="uk-button uk-button-primary btn-rencana btn-pads btn-search-map uk-width-auto" onclick="tableSearch()" style="top: -3px; height: 41px; line-height: 2.7; border: 0px;">Cari</button>
            </div>
        </div>
    </div>
</div>
</script>

    <script type="text/template" id="template-content-builder-render-modal_content">
    <% var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("cta_vertical")); %>
    <div class="modal-content-wrapper">
        <a class="uk-button <%= settings.type === 'primary' ? 'uk-button-primary' : 'uk-button-secondary' %> uk-margin-top" href="#" data-uk-ef_modal_content_button><%=settings.cta_text%></a>
        <div class="uk-hidden">
            <%=settings.content%>
        </div>
    </div>
</script>

    <script type="text/template" id="template-content-builder-render-loop_calendar">
    <%var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("loop_slider"))%>
    <div class="uk-container">
        <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-small-bottom">
            <h3 class="uk-margin-remove-bottom"><%=settings.title%></h3>
            <a class="uk-button uk-button-text" href="<%=settings.url_link%>"><%=settings.text_link%></a>
        </div>
        <div data-uk-ef_calendar_posts=""
            data-post-type="<%=settings.postType%>"
            data-year="<%=settings.year%>"
            data-column="<%=settings.column%>"
            data-categories="<%=settings.postCategory%>"
            data-sort="<%=settings.sort%>"
            data-sort-type="<%=settings.sortType%>"
        ></div>
    </div>
</script>

    <script type="text/template" id="template-content-builder-render-divider">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("divider"));
%>
<hr/>
</script>
    <script type="text/template" id="template-content-builder-render-card">
    <% var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("card")); %>
    <%
    var isCustomBackground = settings.style == 'custom' && settings.customBackground !== "",
        cardStyle="";
    %>
    <%if(isCustomBackground){
		cardStyle = settings.customBackground;
	}%>
    <%if(!_.isEmpty(settings.linkStyle) && !_.isEmpty(settings.url)){%>
        <a href="<%=settings.url%>" class="uk-card <%=settings.style%> uk-card-hover uk-card-body <%=settings.size%> <%=settings.size == "uk-card-small" ? "uk-padding-small" : ""%>" style="<%=cardStyle%>">
    <%}%>
    
    <div 
        class="<%if(_.isEmpty(settings.linkStyle)){%>uk-card <%=settings.style%> uk-card-hover uk-card-body <%=settings.size%><%}%>"
        style="<%=_.isEmpty(settings.linkStyle) ? cardStyle : ""%>"
    >
        <%if(!_.isEmpty(settings.title)){%>
            <h5><%=settings.title%></h5>
        <%}%>
        <%if(!_.isEmpty(settings.content)){%>
            <%=settings.content%>
        <%}%>
        <%if(!_.isEmpty(settings.url) && !_.isEmpty(settings.linkText) && _.isEmpty(settings.linkStyle)){%>
            <div>
                <a class="uk-button uk-button-text" href="<%=settings.url%>"><%=settings.linkText%></a>
            </div>
        <%}%>
    </div>
    <%if(!_.isEmpty(settings.linkStyle) && !_.isEmpty(settings.url)){%>
        </a>
    <%}%>
</script>

    <script type="text/template" id="template-content-builder-render-jarkan">
    <%var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("jarkan"))%>
    <div class="uk-section uk-section-expand">
        <div data-uk-grid data-uk-ef_jarkan_container>
            <div class="uk-width-2-3@m">
                <div class="ef-jarkan-container">
                    <ul class="uk-flex-left uk-tab" uk-switcher="connect:#ef-jarkan-items;">
                        <li><a href="#">Kantor Terdekat</a></li>
                        <li><a href="#">ATM</a></li>
                        <li><a href="#">Kantor Cabang Pembantu</a></li>
                        <li><a href="#">Kantor Cabang</a></li>
                        <li><a href="#">Kantor Wilayah</a></li>
                    </ul>
                </div>
                <div class="uk-switcher" id="ef-jarkan-items">
                    <div>
                        <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-medium-bottom">
                            <h3 class="uk-margin-remove-bottom"><%=settings.title%></h3>
                            <a class="uk-button uk-button-text" href="<%=settings.url_link%>"><%=settings.text_link%></a>
                        </div>
                        <div data-uk-ef_jarkan
                            data-limit="<%=settings.limit%>"
                            data-is-pagination="<%=settings.isPagination||true%>"
                            data-mode="<%=settings.mode%>"
                            data-column="<%=settings.column%>"
                            data-type=""
                            data-enable-trigger-button="true"
                            class="uk-height-1-1"
                        ></div>
                    </div>
                    <div>
                        <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-medium-bottom">
                            <h3 class="uk-margin-remove-bottom"><%=settings.title%></h3>
                            <a class="uk-button uk-button-text" href="<%=settings.url_link%>"><%=settings.text_link%></a>
                        </div>
                        <div data-uk-ef_jarkan
                            data-limit="<%=settings.limit%>"
                            data-is-pagination="<%=settings.isPagination||true%>"
                            data-mode="<%=settings.mode%>"
                            data-column="<%=settings.column%>"
                            data-type="ATM"
                            class="uk-height-1-1"
                        ></div>
                    </div>
                    <div>
                        <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-medium-bottom">
                            <h3 class="uk-margin-remove-bottom"><%=settings.title%></h3>
                            <a class="uk-button uk-button-text" href="<%=settings.url_link%>"><%=settings.text_link%></a>
                        </div>
                        <div data-uk-ef_jarkan
                            data-limit="<%=settings.limit%>"
                            data-is-pagination="<%=settings.isPagination||true%>"
                            data-mode="<%=settings.mode%>"
                            data-column="<%=settings.column%>"
                            data-type="KCP"
                            class="uk-height-1-1"
                        ></div>
                    </div>
                    <div>
                        <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-medium-bottom">
                            <h3 class="uk-margin-remove-bottom"><%=settings.title%></h3>
                            <a class="uk-button uk-button-text" href="<%=settings.url_link%>"><%=settings.text_link%></a>
                        </div>
                        <div data-uk-ef_jarkan
                            data-limit="<%=settings.limit%>"
                            data-is-pagination="<%=settings.isPagination||true%>"
                            data-mode="<%=settings.mode%>"
                            data-column="<%=settings.column%>"
                            data-type="KC"
                            class="uk-height-1-1"
                        ></div>
                    </div>
                    <div class="uk-height-1-1">
                        <div class="uk-flex uk-flex-between uk-flex-middle uk-margin-medium-bottom">
                            <h3 class="uk-margin-remove-bottom"><%=settings.title%></h3>
                            <a class="uk-button uk-button-text" href="<%=settings.url_link%>"><%=settings.text_link%></a>
                        </div>
                        <div data-uk-ef_jarkan
                            data-limit="<%=settings.limit%>"
                            data-is-pagination="<%=settings.isPagination||true%>"
                            data-mode="<%=settings.mode%>"
                            data-column="<%=settings.column%>"
                            data-type="Kanwil"
                            class="uk-height-1-1"
                        ></div>
                    </div>
                </div>
            </div>
            <div class="uk-width-1-3@m">
                <div class="uk-margin-small">
                    <label class="uk-form-label" for="form-stacked-text">Kota</label>
                    <div class="uk-form-controls">
                        <select 
                            class="ef-form-element uk-select"
                            id="ef-jarkan-city"
                            data-uk-select2="is-ajax:true;url:/city/filter;id-identifier:id;text-identifier:fullName;search-identifier:name;include-text-value:false;placeholder:Kota"
                        >
                        </select>
                    </div>
                </div>
                <div class="uk-margin-small">
                    <label class="uk-form-label" for="form-stacked-text">Alamat</label>
                    <div class="uk-form-controls">
                        <input 
                            class="ef-form-element uk-input"
                            id="ef-jarkan-address"
                            placeholder="Alamat"
                        />
                    </div>
                </div>
                <button class="uk-button uk-button-small uk-button-primary uk-margin-small-top ef-jarkan-button uk-width-1-1">Layanan</button>
                <div class="uk-margin ef-jarkan-map">
                    <iframe class="uk-width-1-1" height="730" id="gmap_canvas" src="https://maps.google.com/maps?q=Bandung&t=&z=13&ie=UTF8&iwloc=&output=embed&destination=-7.228700000,112.608500000" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</script>

    <script type="text/template" id="template-content-builder-render-trading_view">
    <%
        var tradingViewId = _.uniqueId('ef-trading-view-uid-' + _.now() + '-');
    %>
    <%var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("trading_view"))%>
    <div>
        <div data-uk-ef_trading_view="trading-view-id:<%=tradingViewId%>;type:<%=settings.type%>;">
            <div class="tradingview-widget-container">
                <div id="<%=tradingViewId%>" style="height:400px;"></div>
            </div>
        </div>
    </div>
</script>
    <script type="text/template" id="template-content-builder-render-image">

    <%var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("image"))%>

    <div class="uk-inline <%=settings.class%>">
        <%if(settings.link != ""){%>
            <a href="<%=settings.link%>" target="<%=settings.target%>">
        <%}%>
        <%if(!_.isEmpty(settings.imageDesktop)){%>
            <img data-src="<%=bjb.getImageSrc(settings.imageDesktop)%>" alt="Image Desktop" width="<%=settings.desktopWidth%>" class="uk-visible@m" uk-img />
        <%}%>
        <%if(!_.isEmpty(settings.imageTab)){%>
            <img data-src="<%=bjb.getImageSrc(settings.imageTab)%>" alt="Image Tablet" width="<%=settings.tabWidth%>" class="uk-visible@s uk-hidden@m" uk-img />
        <%}%>
        <%if(!_.isEmpty(settings.imageMobile)){%>
            <img data-src="<%=bjb.getImageSrc(settings.imageMobile)%>" alt="Image Mobile" width="<%=settings.mobileWidth%>" class="uk-visible uk-hidden@s" uk-img />
        <%}%>
        <%if(settings.link != ""){%>
            </a>
        <%}%>
    </div>
    
</script>
    <script type="text/template" id="template-content-builder-render-stock_price">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("stock_price"));
%>
<div class="uk-navbar-item nav-overlay" data-uk-ef_stock_price="symbol:<%=settings.symbol%>;">
</div>
</script>

    <script type="text/template" id="template-content-builder-render-stock_price-content">
	<div class="uk-light uk-flex uk-flex-middle">
		<span class="uk-margin-small-right">
			<%=data.info.symbol%>
		</span>
		<span class="uk-margin-small-right">
			Rp. <%=data.info.regularMarketPrice.fmt%>
		</span>
		<span class="uk-badge">
			<span data-uk-icon="<%=data.info.regularMarketChange.raw < 0 ? "icon-chevron-down" : "icon-chevron-up"%>"></span>
			<%=data.info.regularMarketChange.fmt%> ( <%=data.info.regularMarketChangePercent.fmt%> )
		</span>
	</div>
</script>
    <script type="text/template" id="template-content-builder-render-stock_summary">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("stock_summary"));
%>
<div class="uk-navbar-item nav-overlay" data-uk-ef_stock_summary="symbol:<%=settings.symbol%>;">
</div>
</script>

    <script type="text/template" id="template-content-builder-render-stock_summary-content">
	<div class="uk-card uk-card-small uk-card-body uk-card-default uk-width-1-1">
		<div class="uk-grid-divider uk-child-width-1-1 uk-grid-small" data-uk-grid>
			<div class="uk-margin-small">
				<span class="uk-badge uk-background-muted">Stock</span>
				<span class="uk-badge uk-margin-left uk-background-muted">ID Headquartered</span>
			</div>
			<div class="uk-margin-small">
				<div class="uk-flex uk-flex-between">
					<span class="uk-text-muted">Previous Close</span>
					<span class="uk-text-bold">Rp. <%=data.info.regularMarketPreviousClose.fmt%></span>
				</div>
			</div>
			<!-- <div>
				<div class="uk-flex uk-flex-between">
					<span class="uk-text-muted">Day Range</span>
					<span class="uk-text-bold">Rp. <%=data.info.regularMarketDayLow.fmt%> - Rp. <%=data.info.regularMarketDayHigh.fmt%></span>
				</div>
			</div>
			<div>
				<div class="uk-flex uk-flex-between">
					<span class="uk-text-muted">Year Range</span>
					<span class="uk-text-bold">Rp. <%=data.info.fiftyTwoWeekLow.fmt%> - Rp. <%=data.info.fiftyTwoWeekHigh.fmt%></span>
				</div>
			</div> -->
			<div class="uk-margin-small">
				<div class="uk-flex uk-flex-between">
					<span class="uk-text-muted">Market Cap</span>
					<span class="uk-text-bold">Rp. <%=data.info.marketCap.fmt%></span>
				</div>
			</div>
			<div class="uk-margin-small">
				<div class="uk-flex uk-flex-between">
					<span class="uk-text-muted">Average Transaction</span>
					<span class="uk-text-bold"><%=data.info.averageVolume.fmt%></span>
				</div>
			</div>
			<div class="uk-margin-small">
				<div class="uk-flex uk-flex-between">
					<span class="uk-text-muted">PER</span>
					<span class="uk-text-bold"><%=data.info.trailingPE.fmt%></span>
				</div>
			</div>
			<div class="uk-margin-small">
				<div class="uk-flex uk-flex-between">
					<span class="uk-text-muted">PBV</span>
					<span class="uk-text-bold"><%=data.info.priceToBook.fmt%></span>
				</div>
			</div>
			<div class="uk-margin-small">
				<div class="uk-flex uk-flex-between">
					<a href="/page/dividen" class="uk-link">Last Dividend</a>
					<span class="uk-text-bold"><%=data.info.dividendRate.fmt%></span>
				</div>
			</div>
			<div class="uk-margin-small">
				<div class="uk-flex uk-flex-between">
					<a href="/page/penambahan-modal" class="uk-link">More Info</a>
				</div>
			</div>
		</div>
	</div>
</script>
    <script type="text/template" id="template-content-builder-render-running_posts">
    <%var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("running_posts"))%>
    <div class="uk-navbar-item" 
        data-uk-ef_blog_posts
        data-post-type="<%=settings.postType%>"
        data-limit="<%=settings.limit%>"
        data-is-pagination="false"
        data-mode="running"
        data-column="uk-width-1-1"
        data-categories="<%=settings.postCategory%>"
        data-sort="<%=settings.sort%>"
        data-sort-type="<%=settings.sortType%>"
        data-text-color="<%=settings.color%>"
        data-disable-skeleton="true"
        data-asset-type="<%=settings.assetType%>"
    >
        <div class="blog-posts-content"></div>
    </div>
</script>


    <script type="text/template" id="template-content-builder-render-link_icon">
    <% var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("link_icon")); %>

    <div class="uk-border-rounded cta-vertical__icon uk-inline">
        <a href="<%=settings.url%>">
            <span data-uk-icon="icon:<%=settings.icon%>;ratio:1.5;"></span>
        </a>
    </div>
    <h5 class="uk-margin-small-top"><%=settings.title%></h5>
</script>
    <script type="text/template" id="template-content-builder-render-copyright">
<%
var currentDate = new Date();
%>
Copyright © <%=currentDate.getFullYear()%>
</script>

    <script type="text/template" id="template-content-builder-render-sliderCta">
    <% var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("sliderCta")); %>
    <div uk-slider="center: false;autoplay:true;autoplay-interval:5000;">

        <div class="uk-position-relative">

            <div class="uk-slider-container uk-light">
                <ul class="uk-slider-items uk-grid" data-uk-height-match="target: > li > .uk-card">
                    <%_.each(settings.items, function(item){%>
                        <li class="<%=settings.column%>">
                            <a href="<%=item.link%>" alt="<%=item.text%>">
                                <div class="uk-card uk-card-default uk-card-small uk-card-body uk-width-1-1@m uk-height-small uk-card-tertiary" >
                                    <div class="uk-width-4-5">
                                        <span class="uk-h5"><%=item.text%></span>
                                    </div>
                                    <div class="uk-position-bottom-right uk-position-medium uk-margin-bottom">
                                        <div class="uk-border-rounded cta-vertical__icon uk-flex uk-flex-middle uk-flex-center">
                                            <span data-uk-icon="icon:<%=item.icon%>;ratio:1.5;"></span>
                                        </div>
                                        
                                    </div>
                                </div>
                            </a>
                        </li>
                    <%})%>
                </ul>
            </div>
            <!-- <div class="uk-hidden@l uk-light">
                <a class="uk-position-center-left uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-previous="ratio:.6" uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-next="ratio:.6" uk-slider-item="next"></a>
            </div> -->

            <div class="uk-visible@l">
                <a class="uk-position-center-left-out uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right-out uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-next uk-slider-item="next"></a>
            </div>
        </div>
        <ul class="uk-hidden@l uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
    </div>
</script>

    <script type="text/template" id="template-content-builder-render-pdf_view">
    <%var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("pdf_view"))%>
    <div data-uk-ef_pdf_view data-pdf-src="<%=bjb.getImageSrc(settings.src)%>" data-uk-height-viewport></div>
</script>
    <script type="text/template" id="template-content-builder-render-card_slider">
    <%
        var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("card_slider"));
    %>
    <div class="uk-position-relative uk-padding-medium-top uk-slider-container-offset" tabindex="-1" uk-slider>
        <ul class="uk-slider-items uk-grid-match" data-uk-grid data-uk-height-match="target: > li > a > .uk-card > .uk-card-media-top">
            <%_.each(settings.cards, function(card){%>
            <li class="uk-width-1-3@m uk-width-1-2@s">
                <a <%=bjb.getAttr({
					class:[ 'uk-link-reset' ],
					href:"#"
				})%>>
				<div class="uk-card uk-card-default uk-card-small uk-card-hover">
					<div class="uk-card-media-top uk-cover-container" style="height:215px;">
					  <img data-src="<%=bjb.getImageSrc(card.image)%>" class="uk-width-1-1" data-uk-img data-uk-cover/>
                      <div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
                      <div class="uk-position uk-position-bottom-left uk-position-small">
                        <h4 class="uk-margin-remove uk-light"><%=card.title%></h4>
                      </div>
					</div>
					<div class="is-card-overlay uk-light">
						<%=card.content%>
					</div>
				</div>
				</a>
            </li>
            <%})%>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>
</script>


    <!-- Template Parts -->
    <script type="text/template" id="template-content-builder-render-section-nav">
<%
_.each(data.rows, function(row){
%>
	<%=data._this.render("row",row, ["columns","rowid","settings","dataTemplate"])%>
<%})%>
</script>
    <script type="text/template" id="template-content-builder-render-section-mobilenav">
<%
_.each(data.rows, function(row){
%>
	<%=data._this.render("row",row, ["columns","rowid","settings","dataTemplate"])%>
<%})%>
</script>
    <script type="text/template" id="template-content-builder-render-section-nowrap">
<%
_.each(data.rows, function(row){
%>
	<%=data._this.render("row",row, ["columns","rowid","settings","dataTemplate"])%>
<%})%>
</script>
    <script type="text/template" id="template-content-builder-render-row-nav">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("agm_row"));
var navbarSection = {
	class:[
	  !settings.topbar ? "uk-navbar-container" : "uk-container",
		settings.topbar ? "is-headertopbar" : "",
		settings.mainheader ? "is-headermain":"",
		settings.margin,
		! settings.stickyNavbar && settings.transparentNavbar ? ('uk-navbar-transparent ' + settings.transparentColor) : '',
	]
};
var navbarContainer = {
	class: [ settings.container ],
};
var stickyContainer = {
	'data-uk-sticky':[ 
		'sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky;',
		settings.transparentNavbar ?  ('cls-inactive:uk-navbar-transparent ' + settings.transparentColor + ';') : '',
		settings.stickyNavbarTop != "" ? ('top:' + settings.stickyNavbarTop + ';') : '',
		settings.stickyNavbarOffset != "" ? ('offset:' + settings.stickyNavbarOffset + ';') : '',
		settings.stickyNavbarAnimation != "" ? ('animation:' + settings.stickyNavbarAnimation + ';') : '',
		settings.stickyNavbarShowOnUp ? 'show-on-up:true;' : '',
	],
};
var navbar = {
	class: [ 'agm-navbar uk-navbar' ],
	'data-uk-navbar':[
		'align:left;boundary:!.uk-navbar-container;',
		settings.dropbar ? ('dropbar:true;dropbar-mode:' + settings.dropbarMode + ';') : '',

	]
};
%>
<% if( settings.stickyNavbar ){%>
	<div class="" <%=data._this.getAttr(stickyContainer)%>>
<%}%>
<div <%=data._this.getAttr(navbarSection)%>>
	<%if(settings.container !== ""){%>
		<div <%=data._this.getAttr(navbarContainer)%>>
	<%}%>
	<nav <%=data._this.getAttr( navbar )%>>
		<% if( data.dataTemplate.type == 'multiple-centered-navbar' ){%>
			<div class="uk-navbar-center">
		<%}%>
		<%
		_.each(data.columns, function(column, index){
		%>
			<%=data._this.render(
				"column",
				column, 
				["items","columnid","settings", "width"],
				{
					dataTemplate:data.dataTemplate,
					index:index
				}
			)%>
		<%})%>
		<% if( data.dataTemplate.type == 'multiple-centered-navbar' ){%>
			<div class="uk-navbar-center">
		<%}%>
		<%if(settings.mainheader){%>
		<%
			var blog = UIkit.util.$(UIkit.util.parents(data._this.$el, "[data-uk-ef_blog]"));

        	var $blog = UIkit.getComponent(blog, "ef_blog");
			
			var options = _.defaults(
                !_.isUndefined($blog.options.layout)
                    ? $blog.options.layout["General"] || {}
                    : {},
                {
                    popularSearch: []
                }
            );
		%>
		<div style="border-radius:4px;" class="nav-overlay uk-background-default uk-navbar-left uk-flex-1 uk-width-1-1" hidden>

			<div class="uk-navbar-item uk-width-expand">
				<a class="uk-navbar-toggle" uk-close  href="javascript:void(0)"></a>
				<form class="uk-search uk-search-navbar uk-width-1-1" action="<%=bjb.baseURI%>search">
                    <input class="uk-search-input ef-search-input" name="keyword" type="search" placeholder="Ketik untuk mencari..." autofocus >
                </form>
				<%if(!_.isEmpty(options.popularSearch)){%>
				<div class="uk-card uk-card-body uk-card-default" uk-drop="stretch: x;toggle:!.agm-navbar .uk-search-input;mode:hover;boundary-x: !.uk-navbar; pos: bottom-justify;offset:16;">
					<ul class="uk-nav uk-nav-default">
						<li class="uk-active"><a href="#">Popular Search</a></li>
						<li class="uk-nav-divider"></li>
						
						<%_.each(options.popularSearch, function(search){%>
							<li><a href="<%=bjb.baseURI%>search?keyword=<%=search.keyword%>"><%=search.keyword%></a></li>
						<%})%>
					</ul>	
				</div>
				<%}%>
			</div>
		</div>
		<%}%>
	</nav>
	<div class="uk-navbar-dropbar"></div>
	<%if(settings.container !== ""){%>
		</div>
	<%}%>
</div>
<% if( settings.stickyNavbar ){%>
	</div>
<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-row-mobilenav">
    <%
    var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("agm_row"))
    %>
    <%
    _.each(data.columns, function(column){
    %>
        <%=data._this.render("column",column, ["items","columnid","settings", "width"])%>
    <%})%>
</script>
    <script type="text/template" id="template-content-builder-render-row-nowrap">
    <%
    var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("agm_row"));
    %>
    <%
    _.each(data.columns, function(column){
    %>
        <%=data._this.render("column",column, ["items","columnid","settings", "width"])%>
    <%})%>
</script>
    <script type="text/template" id="template-content-builder-render-column-nav">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("agm_column"));
var template = !_.isUndefined(data._additionalData.dataTemplate) ? data._additionalData.dataTemplate.type : "navbar-left";
var index = !_.isUndefined(data._additionalData.index) ? data._additionalData.index : 1;
var columnNavAttrs = {
	class: [
		'agm-navbar-column',
		settings.textAlignment
	]
};
if(template == "navbar-left"){
	columnNavAttrs.class.push("uk-navbar-left");
}
if(template == "multiple-navbar"){
	columnNavAttrs.class.push(index === 0 ? "uk-navbar-left" : "uk-navbar-right");
}
if(template == "centered-navbar"){
	columnNavAttrs.class.push(index !== 0 ? index !== 1 ? "uk-navbar-right" : "uk-navbar-center" : "uk-navbar-left");
}
if(template == "multiple-centered-navbar"){
	columnNavAttrs.class.push(index !== 0 ? index !== 1 ? "uk-navbar-center-right" : "uk-navbar-item" : "uk-navbar-center-left");
}
%>
<div <%=data._this.getAttr(columnNavAttrs)%>>
	<%
	_.each(data.items, function(item){
	%>
		<%=data._this.render(item.name,item, ["settings","itemid"])%>
	<%})%>
</div>
</script>
    <script type="text/template" id="template-content-builder-render-column-mobilenav">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("agm_column"));
var columnNavAttrs = {
	class: [
		'uk-width-1-1',
	]
};
%>
<div <%=data._this.getAttr(columnNavAttrs)%>>
	<%
	_.each(data.items, function(item){
	%>
		<%=data._this.render(item.name,item, ["settings","itemid"])%>
	<%})%>
</div>
</script>
    <script type="text/template" id="template-content-builder-render-column-nowrap">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("agm_column"));
%>
<%
_.each(data.items, function(item){
%>
	<%=data._this.render(item.name,item, ["settings","itemid"])%>
<%})%>
</script>
    <script type="text/template" id="template-content-builder-render-menu-mobilenav">
<%
var settings = _.defaults(data.settings, contentBuilder.render.getDefaultSettings("menu"));
var menuId = "";
if(settings.menu!= ""){
	menuId = settings.menu.split("|")[0];
}
%>
<div data-uk-ef_blog_menu="id:<%=menuId%>;mode:vertical;"></div>
</script>

    <!-- Components -->
    <div class="uk-modal-container is-prestasi uk-modal" id="modal-post" uk-ef_modal_post="" data-uk-modal="">
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-overflow-auto" data-uk-overflow-auto=""
            role="dialog" aria-modal="true">
            <button title="Close popup modal" class="uk-modal-close-default uk-icon uk-close" type="button"
                data-uk-close="" aria-label="Close"></button>
            <div class="modal-post-content"></div>
        </div>
    </div>
    <script type="text/template" id="template-content-builder-render-modal-post">
    <%var meta = bjb.getMeta(data.metas, "custom","General")%>
    <%if(meta.showContent === true){%>
    <div data-uk-grid class="uk-flex uk-flex-bottom@l">
        <div class="uk-width-1-1 uk-width-3-5@m">
        <div class="uk-card-media-top">
            <img data-src="<%=bjb.getImageSrc(data.featuredImage)%>" width="100%" height="auto" alt="Featured Image" uk-img />
        </div>
        </div>
        <div class="uk-width-1-1 uk-width-2-5@m">
            <p class="uk-text-meta">
                <%if(meta.useCustomPostDate === true){%>
                <span data-uk-ef_date_label="date:<%=meta.postDate%>;format:DD/MM/YYYY"></span>
                <%} else {%>
                <span data-uk-ef_date_label="date:<%=data.createdDate%>;"></span>
                <%}%> 
            </p>
            <h3 class="uk-modal-title"><%=data.title%></h3>
            <%=meta.content%>
        </div>
    </div>
    <%} else {%>
        <div class="uk-width-1-1">
            <img data-src="<%=bjb.getImageSrc(data.featuredImage)%>" width="100%" height="auto" alt="Featured Image" uk-img />
        </div>
    <%}%>
</script>
    <div class="ef-banner uk-width-2-3@l uk-width-3-4@m uk-width-4-5 uk-padding-top uk-ef_banner" id="ef-banner"
        data-uk-ef_banner="" data-ef-uid="ef-uid-1784557196130-21"></div>
    <script type="text/template" id="template-content-builder-render-banner-content">
    <div class="ef-banner-close uk-overlay-primary uk-flex uk-border-circle">
        <a href="javascript:void(0)" data-uk-icon="icon:icon-close;ratio:.7"></a>
    </div>
    <div class="uk-height-1-1" data-uk-slider="autoplay:true;autoplay-interval:10000;">
        <ul class="uk-height-1-1 uk-slider-items uk-child-width-1-1">
             <%_.each(data.banner, function(item){%>
                 <li>
                    <a href="<%=item.link%>" class="uk-border-rounded uk-inline uk-height-1-1 uk-width-1-1 uk-background-cover uk-animation-slide-bottom" data-src="<%=bjb.getImageSrc(item.image)%>" uk-img="loading: eager"></a>
                </li>
            <%});%>
        </ul>
    </div>
</script>
    <script type="text/template" id="template-content-builder-render-pagination">
    <ul class="uk-pagination uk-flex-<%=data.position%>" uk-margin>
        <%_.each(data.pages, function(page){%>
        <%if(_.isNumber(page)){%>
        <li class="<%=data.currentPage === (page) ? " uk-active" : "" %>"><a href="#" data-page="<%=(page)%>" data-offset="<%=((page-1)*data.length)%>"><%=(page)%></a></li>
        <%} else {%>
        <li class="uk-disabled"><span><%=page%></span></li>
        <%}%>
        <%})%>
    </ul>
</script>
    <script type="text/template" id="template-content-builder-render-single-post">
    <%
    var  metas = data._this.getMeta("custom","General");
    const TYPE_SINGLE_POST = 0;
    const TYPE_SINGLE_PAGE = 1;
    const TYPE_SINGLE_NEWS = 2;
    const TYPE_SINGLE_PROMO = 3;
    var MAP_TYPE_SINGLE = {
        [TYPE_SINGLE_POST]: 'Artikel',
        [TYPE_SINGLE_PAGE]: 'Berita',
        [TYPE_SINGLE_NEWS]: 'Pengumuman',
        [TYPE_SINGLE_PROMO]: 'Promo',
    };
    %>
    <!-- Breadcrumbs -->
    <%=bjb.renderBreadcrumbs(data.postHierarchy)%>
    <section class="uk-section is-article">
        <div class="uk-container uk-container-small">
            <div class="is-article-title">
                <h1 class="uk-h2"><%=data.title%></h1>
                <p class="uk-text-meta">
                    <span uk-icon="icon: icon-calendar; ratio: .7;"></span>&nbsp;
                    <span data-uk-ef_date_label="date:<%=data.createdDate%>;"></span>&nbsp;
                    <span uk-icon="icon: icon-separator; ratio: .7;"></span>&nbsp;
                    <%=bjb.getCategory(data.categories, "Artikel")%>
                </p>
            </div>
            <% if (!_.isEmpty(data.featuredImage)) { %>
            <div class="uk-margin-medium-top is-article-featuredimg">
                <img data-src="<%=bjb.endpoints.FILE_CLIENT+"/"+data.featuredImage%>" width="960" height="auto" alt="Featured Image" uk-img />
            </div>
            <% } %>
        </div>
    </section>
    <!-- Article Content -->
    <article class="uk-section uk-padding-remove-top is-article-content">
        <div class="uk-container uk-container-small">
            <div class="<% data.type === TYPE_SINGLE_POST ? 'uk-grid-large' : '' %>" uk-grid>
                <!-- Floating Share Button -->
                <div class="uk-first-column uk-width-auto@s uk-visible@s">
                    <div class="is-single-share-sticky">
                        <div class="uk-text-center">
                            <p>Bagikan</p>
                            <div class="uk-flex uk-flex-column is-single-share-link">
                                <a class="uk-first-column" href="https://www.facebook.com/sharer/sharer.php?u=<%=decodeURIComponent(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Facebook share icon">
                                    <span uk-icon="icon: icon-facebook; ratio: 1.5"></span>
                                </a>
                                <a class="" href="https://twitter.com/intent/tweet?url=<%=_.escape(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Twitter share icon">
                                    <span uk-icon="icon: icon-twitter; ratio: 1.5"></span>
                                </a>
                                <!-- <a class="" href="" target="_blank" rel="noopener" aria-label="Linkedin share icon">
                                    <span uk-icon="icon: icon-linkedin; ratio: 1.5"></span>
                                </a> -->
                                <a class="" href="https://api.whatsapp.com/send?text=<%=_.escape(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Whatsapp share icon">
                                    <span uk-icon="icon: icon-whatsapp; ratio: 1.5"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-width-expand@s is-article-news">
                    <div class="blog-main-content"></div>
                </div>
            </div>
        </div>
    </article>
    <% if (data.type !== TYPE_SINGLE_PAGE) { %>
    <!-- Share Button -->
    <section class="uk-section uk-padding-remove-top is-single-share uk-hidden@s">
        <div class="uk-container uk-text-center">
            <p>Bagikan</p>
            <div class="uk-child-width-auto uk-grid-small uk-flex-inline uk-flex-middle is-single-share-link" uk-grid>
                <a class="uk-first-column" href="https://www.facebook.com/sharer/sharer.php?u=<%=_.escape(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Facebook share icon">
                    <span uk-icon="icon: icon-facebook; ratio: 1.5"></span>
                </a>
                <a class="" href="https://twitter.com/intent/tweet?url=<%=_.escape(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Twitter share icon">
                    <span uk-icon="icon: icon-twitter; ratio: 1.5"></span>
                </a>
                <a class="" href="https://api.whatsapp.com/send?text=<%=_.escape(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Whatsapp share icon">
                    <span uk-icon="icon: icon-whatsapp; ratio: 1.5"></span>
                </a>
            </div>
        </div>
    </section>
    <!-- Back to Loop Button -->
    <section class="uk-section uk-section-default is-back-loop">
        <div class="uk-container">
            <div class="uk-flex uk-flex-center uk-flex-middle">
                <a class="uk-button uk-button-primary" href="<%=!_.isUndefined(metas.backLink) && metas.backLink != "" ? metas.backLink : ("/"+data._Type)%>">
                    <%if(!_.isUndefined(metas.backText) && metas.backText != ""){%>
                        <%=metas.backText%>
                    <%}else{%>
                    Kembali ke <%=MAP_TYPE_SINGLE[data.type]%>
                    <%}%>
                </a>
            </div>
        </div>
    </section>
    <% } %>
    <!-- Related Posts -->
    <section class="uk-section uk-section-muted">
        <div class="uk-container">
            <h3 class="uk-h3"> <%=MAP_TYPE_SINGLE[data.type]%> Lainnya </h3>
            <div data-uk-ef_blog_posts="post-type:<%=data._Type %>;mode:slider;limit:10;is-pagination:false"></div>
        </div>
    </section>
</script>
    <script type="text/template" id="template-content-builder-render-single-post-news">
    <%
    var  metas = data._this.getMeta("custom","General");
    const TYPE_SINGLE_POST = 0;
    const TYPE_SINGLE_PAGE = 1;
    const TYPE_SINGLE_NEWS = 2;
    const TYPE_SINGLE_PROMO = 3;
    var MAP_TYPE_SINGLE = {
        [TYPE_SINGLE_POST]: 'Artikel',
        [TYPE_SINGLE_PAGE]: 'Berita',
        [TYPE_SINGLE_NEWS]: 'Berita',
        [TYPE_SINGLE_PROMO]: 'Promo',
    };
    %>
    <!-- Article Content -->
    <article class="uk-section uk-padding-remove-vertical is-article-content uk-margin-large-top">
        <div class="uk-container uk-container-xsmall">
            <!-- Breadcrumbs -->
            <div class="is-article-title">
                <p class="uk-text-meta">
                    <span uk-icon="icon: icon-calendar; ratio: .7;"></span>&nbsp;
                    <span data-uk-ef_date_label="date:<%=data.createdDate%>;"></span>&nbsp;
                    <span uk-icon="icon: icon-separator; ratio: .7;"></span>&nbsp;
                    <%=bjb.getCategory(data.categories, "Berita")%>
                </p>
                <h1 class="uk-h2 uk-margin-remove-top"><%=data.title%></h1>
            </div>
            <%if(!_.isEmpty(data.featuredImage)){%>
                <img class="uk-border-rounded" data-src="<%=bjb.getImageSrc(data.featuredImage)%>" uk-img="loading: eager"/>
            <%}else if(!_.isEmpty(data.thumbnailImage)){%>
                <img class="uk-border-rounded" data-src="<%=bjb.getImageSrc(data.thumbnailImage)%>" uk-img="loading: eager"/>
            <%}%>
            <div class="<% data.type === TYPE_SINGLE_POST ? 'uk-grid-large' : '' %>" uk-grid>
                <div class="uk-width-1-1 uk-width-expand@s is-article-news">
                    <div class="blog-main-content"></div>
                </div>
            </div>
        </div>
    </article>
    <!-- Share Button -->
    <section class="uk-section uk-padding-remove-top is-single-share <% data.type === TYPE_SINGLE_POST ? 'uk-hidden@s' :'' %>">
        <div class="uk-container uk-container-xsmall uk-text-left">
            <hr/>
            <p>Bagikan</p>
            <div class="uk-child-width-auto uk-grid-small uk-flex-inline uk-flex-middle is-single-share-link" uk-grid>
                <a class="uk-first-column" href="https://www.facebook.com/sharer/sharer.php?u=<%=_.escape(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Facebook share icon">
                    <span uk-icon="icon: icon-facebook; ratio: 1.5"></span>
                </a>
                <a class="" href="https://twitter.com/intent/tweet?url=<%=_.escape(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Twitter share icon">
                    <span uk-icon="icon: icon-twitter; ratio: 1.5"></span>
                </a>
                <a class="" href="https://api.whatsapp.com/send?text=<%=_.escape(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Whatsapp share icon">
                    <span uk-icon="icon: icon-whatsapp; ratio: 1.5"></span>
                </a>
            </div>
        </div>
    </section>
    <!-- Related Posts -->
    <section class="uk-section uk-section-muted">
        <div class="uk-container">
            <h3 class="uk-h3"> <%=MAP_TYPE_SINGLE[data.type]%> Lainnya </h3>
            <div data-uk-ef_blog_posts="post-type:<%=data._Type == "Page" ? "News":data._Type %>;mode:slider;limit:10;is-pagination:false"></div>
        </div>
    </section>
</script>
    <script type="text/template" id="template-content-builder-render-single-post-pengumuman">
    <%
    var  metas = data._this.getMeta("custom","General");
    const TYPE_SINGLE_POST = 0;
    const TYPE_SINGLE_PAGE = 1;
    const TYPE_SINGLE_NEWS = 2;
    const TYPE_SINGLE_PROMO = 3;
    var MAP_TYPE_SINGLE = {
        [TYPE_SINGLE_POST]: 'Artikel',
        [TYPE_SINGLE_PAGE]: 'Berita',
        [TYPE_SINGLE_NEWS]: 'Berita',
        [TYPE_SINGLE_PROMO]: 'Promo',
    };
    %>
    <!-- Article Content -->
    <article class="uk-section uk-padding-remove-vertical is-article-content uk-margin-large-top">
        <div class="uk-container uk-container-xsmall">
            <!-- Breadcrumbs -->
            <div class="is-article-title">
                <p class="uk-text-meta">
                    <span uk-icon="icon: icon-calendar; ratio: .7;"></span>&nbsp;
                    <span data-uk-ef_date_label="date:<%=data.createdDate%>;"></span>&nbsp;
                    <%if(!_.isEmpty(data.categories)){%>
					<span data-uk-icon="icon: icon-separator; ratio: .7;" class="uk-icon">
					</span>
					<%}%>
					<%=bjb.getCategory(data.categories)%>
                </p>
                <h1 class="uk-h2 uk-margin-remove-top"><%=data.title%></h1>
            </div>
            <%if(!_.isEmpty(data.featuredImage)){%>
                <div class="uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light" data-src="<%=bjb.getImageSrc(data.featuredImage)%>" uk-img="loading: eager"></div>
            <%}else if(!_.isEmpty(data.thumbnailImage)){%>
                <div class="uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light" data-src="<%=bjb.getImageSrc(data.thumbnailImage)%>" uk-img="loading: eager"></div>
            <%}%>
            <div class="<% data.type === TYPE_SINGLE_POST ? 'uk-grid-large' : '' %>" uk-grid>
                <div class="uk-width-1-1 uk-width-expand@s is-article-news">
                    <div class="blog-main-content"></div>
                </div>
            </div>
        </div>
    </article>
    <!-- Share Button -->
    <section class="uk-section uk-padding-remove-top is-single-share <% data.type === TYPE_SINGLE_POST ? 'uk-hidden@s' :'' %>">
        <div class="uk-container uk-container-xsmall uk-text-left">
            <hr/>
            <p>Bagikan</p>
            <div class="uk-child-width-auto uk-grid-small uk-flex-inline uk-flex-middle is-single-share-link" uk-grid>
                <a class="uk-first-column" href="https://www.facebook.com/sharer/sharer.php?u=<%=_.escape(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Facebook share icon">
                    <span uk-icon="icon: icon-facebook; ratio: 1.5"></span>
                </a>
                <a class="" href="https://twitter.com/intent/tweet?url=<%=_.escape(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Twitter share icon">
                    <span uk-icon="icon: icon-twitter; ratio: 1.5"></span>
                </a>
                <a class="" href="https://api.whatsapp.com/send?text=<%=_.escape(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Whatsapp share icon">
                    <span uk-icon="icon: icon-whatsapp; ratio: 1.5"></span>
                </a>
            </div>
        </div>
    </section>
    <!-- Related Posts -->
    <section class="uk-section uk-section-muted">
        <div class="uk-container">
            <h3 class="uk-h3"> <%=MAP_TYPE_SINGLE[data.type]%> Lainnya </h3>
            <div data-uk-ef_blog_posts="post-type:<%=data._Type == "Page" ? "News":data._Type %>;mode:slider;limit:10;is-pagination:false"></div>
        </div>
    </section>
</script>
    <script type="text/template" id="template-content-builder-render-single-post-informasi">
    <%
    var  metas = data._this.getMeta("custom","General");
    const TYPE_SINGLE_POST = 0;
    const TYPE_SINGLE_PAGE = 1;
    const TYPE_SINGLE_NEWS = 2;
    const TYPE_SINGLE_PROMO = 3;
    var MAP_TYPE_SINGLE = {
        [TYPE_SINGLE_POST]: 'Artikel',
        [TYPE_SINGLE_PAGE]: 'Berita',
        [TYPE_SINGLE_NEWS]: 'Berita',
        [TYPE_SINGLE_PROMO]: 'Promo',
    };
    %>
    <!-- Article Content -->
    <article class="uk-section uk-padding-remove-vertical is-article-content uk-margin-large-top">
        <div class="uk-container uk-container-xsmall">
            <!-- Breadcrumbs -->
            <div class="is-article-title">
                <p class="uk-text-meta">
                    <span uk-icon="icon: icon-calendar; ratio: .7;"></span>&nbsp;
                    <span data-uk-ef_date_label="date:<%=data.createdDate%>;"></span>&nbsp;
                    <span uk-icon="icon: icon-separator; ratio: .7;"></span>&nbsp;
                    <%=bjb.getCategory(data.categories)%> 
                </p>
                <h1 class="uk-h2 uk-margin-remove-top"><%=data.title%></h1>
            </div>
            <%if(!_.isEmpty(data.featuredImage)){%>
                <div class="uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light" data-src="<%=bjb.getImageSrc(data.featuredImage)%>" uk-img="loading: eager"></div>
            <%}else if(!_.isEmpty(data.thumbnailImage)){%>
                <div class="uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light" data-src="<%=bjb.getImageSrc(data.thumbnailImage)%>" uk-img="loading: eager"></div>
            <%}%>
            <div class="<% data.type === TYPE_SINGLE_POST ? 'uk-grid-large' : '' %>" uk-grid>
                <div class="uk-width-1-1 uk-width-expand@s is-article-news">
                    <div class="blog-main-content"></div>
                </div>
            </div>
        </div>
    </article>
    <!-- Share Button -->
    <section class="uk-section uk-padding-remove-top is-single-share <% data.type === TYPE_SINGLE_POST ? 'uk-hidden@s' :'' %>">
        <div class="uk-container uk-container-xsmall uk-text-left">
            <hr/>
            <p>Bagikan</p>
            <div class="uk-child-width-auto uk-grid-small uk-flex-inline uk-flex-middle is-single-share-link" uk-grid>
                <a class="uk-first-column" href="https://www.facebook.com/sharer/sharer.php?u=<%=_.escape(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Facebook share icon">
                    <span uk-icon="icon: icon-facebook; ratio: 1.5"></span>
                </a>
                <a class="" href="https://twitter.com/intent/tweet?url=<%=_.escape(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Twitter share icon">
                    <span uk-icon="icon: icon-twitter; ratio: 1.5"></span>
                </a>
                <a class="" href="https://api.whatsapp.com/send?text=<%=_.escape(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Whatsapp share icon">
                    <span uk-icon="icon: icon-whatsapp; ratio: 1.5"></span>
                </a>
            </div>
        </div>
    </section>
    <!-- Related Posts -->
    <section class="uk-section uk-section-muted">
        <div class="uk-container">
            <h3 class="uk-h3"> <%=MAP_TYPE_SINGLE[data.type]%> Lainnya </h3>
            <div data-uk-ef_blog_posts="post-type:<%=data._Type == "Page" ? "News":data._Type %>;mode:slider;limit:10;is-pagination:false"></div>
        </div>
    </section>
</script>
    <script type="text/template" id="template-content-builder-render-single-post-promo">
    <%
    var  metas = data._this.getMeta("custom","General");
    const TYPE_SINGLE_POST = 0;
    const TYPE_SINGLE_PAGE = 1;
    const TYPE_SINGLE_NEWS = 2;
    const TYPE_SINGLE_PROMO = 3;
    var MAP_TYPE_SINGLE = {
        [TYPE_SINGLE_POST]: 'Artikel',
        [TYPE_SINGLE_PAGE]: 'Berita',
        [TYPE_SINGLE_NEWS]: 'Berita',
        [TYPE_SINGLE_PROMO]: 'Promo',
    };
    %>
    <!-- Article Content -->
    <article class="uk-section uk-padding-remove-vertical is-article-content uk-margin-large-top">
        <div class="uk-container uk-container-xsmall">
            <!-- Breadcrumbs -->
            <div class="is-article-title">
                <p class="uk-text-meta">
                    <span uk-icon="icon: icon-calendar; ratio: .7;"></span>&nbsp;
                    <span data-uk-ef_date_label="date:<%=data.createdDate%>;"></span>&nbsp;
                    <span uk-icon="icon: icon-separator; ratio: .7;"></span>&nbsp;
                    <%=MAP_TYPE_SINGLE[data.type]%>
                </p>
                <h1 class="uk-h2 uk-margin-remove-top"><%=data.title%></h1>
            </div>
            <%if(!_.isEmpty(data.featuredImage)){%>
                <img class="uk-border-rounded" data-src="<%=bjb.getImageSrc(data.featuredImage)%>" uk-img="loading: eager"/>
            <%}else if(!_.isEmpty(data.thumbnailImage)){%>
                <img class="uk-border-rounded" data-src="<%=bjb.getImageSrc(data.thumbnailImage)%>" uk-img="loading: eager"/>
            <%}%>
            <div class="<% data.type === TYPE_SINGLE_POST ? 'uk-grid-large' : '' %>" uk-grid>
                <div class="uk-width-1-1 uk-width-expand@s is-article-news">
                    <div class="blog-main-content"></div>
                </div>
            </div>
        </div>
    </article>
    <!-- Share Button -->
    <section class="uk-section uk-padding-remove-top is-single-share <% data.type === TYPE_SINGLE_POST ? 'uk-hidden@s' :'' %>">
        <div class="uk-container uk-container-xsmall uk-text-left">
            <hr/>
            <p>Bagikan</p>
            <div class="uk-child-width-auto uk-grid-small uk-flex-inline uk-flex-middle is-single-share-link" uk-grid>
                <a class="uk-first-column" href="https://www.facebook.com/sharer/sharer.php?u=<%=_.escape(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Facebook share icon">
                    <span uk-icon="icon: icon-facebook; ratio: 1.5"></span>
                </a>
                <a class="" href="https://twitter.com/intent/tweet?url=<%=_.escape(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Twitter share icon">
                    <span uk-icon="icon: icon-twitter; ratio: 1.5"></span>
                </a>
                <a class="" href="https://api.whatsapp.com/send?text=<%=_.escape(bjb.baseURI+data.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Whatsapp share icon">
                    <span uk-icon="icon: icon-whatsapp; ratio: 1.5"></span>
                </a>
            </div>
        </div>
    </section>
    <!-- Related Posts -->
    <section class="uk-section uk-section-muted">
        <div class="uk-container">
            <h3 class="uk-h3"> <%=MAP_TYPE_SINGLE[data.type]%> Lainnya </h3>
            <div data-uk-ef_blog_posts="post-type:<%=data._Type == "Page" ? "News":data._Type %>;mode:slider;limit:10;is-pagination:false"></div>
        </div>
    </section>
</script>
    <script type="text/template" id="template-content-builder-render-single-post-page">
   <%
    var metas = data._this.getMeta("layout","General");
    if(metas.style === "inherit"){
        var parentMeta = data._this.getParentMeta("layout","General");
        if(!_.isEmpty(parentMeta)){
            metas.style = parentMeta.style;
            metas.secondLineTextColor = parentMeta.secondLineTextColor;
            metas.video = parentMeta.video;
            metas.image = parentMeta.image;
            metas.title = parentMeta.title;
            metas.subTitle = parentMeta.subTitle;
            metas.firstLineText = parentMeta.firstLineText;
            metas.secondLineText = parentMeta.secondLineText;
            metas.firstLineTextColor = parentMeta.firstLineTextColor;
            metas.secondLineTextColor = parentMeta.secondLineTextColor;
            metas.slider = parentMeta.slider;
            metas.template = parentMeta.template;
            metas.beforeFooter = parentMeta.beforeFooter;
            metas.blockHeroImage = parentMeta.blockHeroImage;
            metas.articleRecommendations = parentMeta.articleRecommendations;
            metas.beforeFooterCustomClass = parentMeta.beforeFooterCustomClass;
            metas.headerStyle = parentMeta.headerStyle;
            metas.afterPageTitle = parentMeta.afterPageTitle;
            metas.sliderHeight = parentMeta.sliderHeight;
            metas.sliderCustomRatio = parentMeta.sliderCustomRatio;
            metas.sliderRatio = parentMeta.sliderRatio;
        }
    }
    data._this.setHeader(metas.headerStyle);
    document.documentElement.style
    .setProperty('--page-header-second-line-text-color', metas.secondLineTextColor);
    %>
    <%if(_.isUndefined(metas.style) || _.isEmpty(metas.style) || metas.style == "inherit" || metas.style == "disabled"){%>
        <%=data._this.renderPageTitle(data,metas)%>
    <%}%>

    <%if(metas.style === "video"){%>
        <%=data._this.renderPageTitle(data,metas,"video")%>
    <%}%>
    <%if(metas.style === "image"){%>
        <%=data._this.renderPageTitle(data,metas,"image")%>
    <%}%>
    <%if(metas.style === "textImage"){%>
        <%=data._this.renderPageTitle(data,metas,"text-image")%>
    <%}%>
    <%if(metas.style === "blockImage"){%>
        <%=data._this.renderPageTitle(data,metas,"block-image")%>
    <%}%>
    <%if(metas.style === "twoLinesTextImage"){%>
        <%=data._this.renderPageTitle(data,metas,"two-lines-text-image")%>
    <%}%>

    <!-- Page Header Slider Style -->

    <%if(metas.style === "slider"){%>
        <%=data._this.renderPageTitle(data,metas,"slider")%>
    <%}%>
    <!-- Page Header Slider Style -->
    <%if(!_.isUndefined(metas.afterPageTitle) && metas.afterPageTitle != ""){%>
    <div class="data-uk-content_builder_render after-page-title" data-uk-content_builder_render=""></div>
    <%}%>
    <!-- Breadcrumbs -->
    <%=metas.breadcrumbs ? bjb.renderBreadcrumbs(data.postHierarchy) : ""%>
    <%if(_.isUndefined(data.subNavs) || data.subNavs == null || (!_.isUndefined(data.subNavs) && data.subNavs != null && data.subNavs.length < 1)){%>
    <div class="blog-main-content"></div>
    <!-- id="fullpage" data-uk-ef_full_page -->
    <%}%>
    <%if(!_.isUndefined(data.subNavs) && data.subNavs != null && data.subNavs.length > 0){%>
    <section class="uk-section">
        <div class="uk-container">
            <div class="" data-uk-grid>
                <div class="uk-width-1-3@m uk-visible@m">
                    <div class="active-sticky-zero-z-index" uk-sticky="end: !.uk-grid;offset:100;media:@m">
                        <ul class="single-post-subnav uk-nav uk-nav-default" uk-switcher="connect:#main-content-single-page;toggle:> li a.ef-content-switch">
                            <%_.each(data.subNavs, function(subNav){%>
                            <li class="<%=data.id == subNav.id ? " uk-active" : "" %>">
                                <a 
                                    class="single-post-subnav-link <%=_.isEmpty(subNav.redirectUri) ? "ef-content-switch" : ""%>" 
                                    href="<%=!_.isEmpty(subNav.redirectUri) ? subNav.redirectUri : "#"%>"
                                    target="<%=!_.isEmpty(subNav.redirectUri) ? "_blank" : ""%>""
                                >
                                    <span class="single-post-subnav-link-icon uk-margin-right"></span>
                                    <%=subNav.title%>
                                </a>
                                <hr/>
                            </li>
                            <%})%>
                        </ul>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-hidden@m">
                    <!-- <ul class="uk-flex-center" uk-tab="connect:#main-content-single-page;toggle:> * > a.ef-content-switch">
                        <%_.each(data.subNavs, function(subNav){%>
                        <li class="<%=data.id == subNav.id ? " uk-active" : "" %>">
                            <a class="<%=_.isEmpty(subNav.redirectUri) ? "ef-content-switch" : ""%>" href="<%=!_.isEmpty(subNav.redirectUri) ? subNav.redirectUri : "#"%>"><%=subNav.title%></a>
                        </li>
                        <%})%>
                    </ul> -->
                    <div class="single-post-subnav-mobile uk-inline uk-width-1-1">
                        <button class="uk-button uk-button-primary uk-width-1-1 uk-flex uk-flex-between uk-flex-middle" type="button">
                            <span>
                                <%=!_.isUndefined(_.findWhere(data.subNavs, {id: data.id})) ? _.findWhere(data.subNavs, {id: data.id}).title : data.subNavs[0].title%>
                            </span> 
                            <span uk-drop-parent-icon></span>
                        </button>
                        <div class="uk-card uk-card-body uk-card-default uk-width-1-1" uk-drop="mode: click;stretch:x;">
                            <ul class="single-post-subnav-mobile-switcher uk-nav uk-nav-default uk-width-1-1" uk-switcher="connect:#main-content-single-page;toggle:> * > a.ef-content-switch">
                                <%_.each(data.subNavs, function(subNav){%>
                                <li class="<%=data.id == subNav.id ? " uk-active" : "" %>">
                                    <a class="<%=_.isEmpty(subNav.redirectUri) ? "ef-content-switch" : ""%>" href="<%=!_.isEmpty(subNav.redirectUri) ? subNav.redirectUri : "#"%>"><%=subNav.title%></a>
                                </li>
                                <%})%>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="uk-width-2-3@m">
                    <ul class="uk-switcher" id="main-content-single-page">
                        <%_.each(data.subNavs, function(subNav){%>
                        <li class="<%=data.id == subNav.id ? " uk-active" : "" %>">
                            <div data-subnav-id="<%=subNav.id%>" class="data-uk-content_builder_render blog-subnav-content" data-uk-content_builder_render></div>
                        </li>
                        <%})%>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <%}%>
    <%if(!metas.articleRecommendations){%>
    <section class="uk-section uk-section-muted">
        <div class="uk-container">
            <h3 class="uk-h3"> Berita Lainnya </h3>
            <div data-uk-ef_blog_posts="post-type:News;mode:slider;limit:10;is-pagination:false"></div>
        </div>
    </section>
    <%}%>
    
    <%if(!_.isUndefined(metas.beforeFooter) && !_.isEmpty(metas.beforeFooter) ){
    var block = metas.beforeFooter.split("|")[0];
    %>
        <div data-uk-ef_blog_post="post-type-slug:<%=block%>;post-type:Block;" class="<%=!_.isEmpty(metas.beforeFooterCustomClass) ? metas.beforeFooterCustomClass : "" %>"></div>
    <%}%>
</script>
    <script type="text/template" id="template-content-builder-render-single-post-style-1-page">
    <%
    var metas = data._this.getMeta("layout","General");
    if(metas.style === "inherit"){
        var parentMeta = data._this.getParentMeta("layout","General");
        if(!_.isEmpty(parentMeta)){
            metas.style = parentMeta.style;
            metas.secondLineTextColor = parentMeta.secondLineTextColor;
            metas.video = parentMeta.video;
            metas.image = parentMeta.image;
            metas.title = parentMeta.title;
            metas.subTitle = parentMeta.subTitle;
            metas.firstLineText = parentMeta.firstLineText;
            metas.secondLineText = parentMeta.secondLineText;
            metas.firstLineTextColor = parentMeta.firstLineTextColor;
            metas.secondLineTextColor = parentMeta.secondLineTextColor;
            metas.slider = parentMeta.slider;
            metas.headerStyle = parentMeta.headerStyle;
        }
    }
    data._this.setHeader(metas.headerStyle);
    document.documentElement.style
    .setProperty('--page-header-second-line-text-color', metas.secondLineTextColor);
    %>
    <%if(_.isUndefined(metas.style) || _.isEmpty(metas.style) || metas.style == "inherit" || metas.style == "disabled"){%>
        <%=data._this.renderPageTitle(data,metas)%>
    <%}%>

    <%if(metas.style === "video"){%>
        <%=data._this.renderPageTitle(data,metas,"video")%>
    <%}%>
    <%if(metas.style === "image"){%>
        <%=data._this.renderPageTitle(data,metas,"image")%>
    <%}%>
    <%if(metas.style === "textImage"){%>
        <%=data._this.renderPageTitle(data,metas,"text-image")%>
    <%}%>
    <%if(metas.style === "blockImage"){%>
        <%=data._this.renderPageTitle(data,metas,"block-image")%>
    <%}%>
    <%if(metas.style === "twoLinesTextImage"){%>
        <%=data._this.renderPageTitle(data,metas,"two-lines-text-image")%>
    <%}%>

    <!-- Page Header Slider Style -->

    <%if(metas.style === "slider"){%>
        <%=data._this.renderPageTitle(data,metas,"slider")%>
    <%}%>
    <!-- Breadcrumbs -->
    <%=metas.breadcrumbs ? bjb.renderBreadcrumbs(data.postHierarchy) : ""%>
    <%if(_.isUndefined(data.subNavs) || data.subNavs == null || (!_.isUndefined(data.subNavs) && data.subNavs != null && data.subNavs.length < 1)){%>
    <div class="blog-main-content"></div>
    <%}%>
    <%if(!_.isUndefined(data.subNavs) && data.subNavs != null && data.subNavs.length > 0){%>
    <%
    var uid = _.uniqueId("subnav-" + _.now() + "-");
    %>
    <div class="uk-container">
        <ul class="uk-flex-left@m uk-flex-center uk-margin-large-top uk-margin-bottom" uk-tab="connect:[data-id=<%=uid%>];">
            <%_.each(data.subNavs, function(subNav){%>
            <li class="<%=data.id == subNav.id ? " uk-active" : "" %>"><a href="#"><%=subNav.title%></a></li>
            <%})%>
        </ul>
    </div>
    <section class="uk-section">
        <div class="uk-container uk-container-small">
            <ul class="uk-switcher uk-margin" data-id="<%=uid%>">
                <%_.each(data.subNavs, function(subNav){%>
                <li class="<%=data.id == subNav.id ? " uk-active" : "" %>
                    ">
                    <div data-subnav-id="<%=subNav.id%>" class="data-uk-content_builder_render blog-subnav-content" data-uk-content_builder_render></div>
                </li>
                <%})%>
            </ul>
        </div>
    </section>
    <%}%>
    <%if(!metas.articleRecommendations){%>
    <section class="uk-section uk-section-muted">
        <div class="uk-container">
            <h3 class="uk-h3"> Berita Lainnya </h3>
            <div data-uk-ef_blog_posts="post-type:News;mode:slider;limit:10;is-pagination:false"></div>
        </div>
    </section>
    <%}%>
    <%if(!_.isUndefined(metas.beforeFooter) && !_.isEmpty(metas.beforeFooter) ){
    var block = metas.beforeFooter.split("|")[0];
    %>
        <div data-uk-ef_blog_post="post-type-slug:<%=block%>;post-type:Block;"></div>
    <%}%>
</script>
    <script type="text/template" id="template-content-builder-render-single-post-style-2-page">
   <%
    var metas = data._this.getMeta("layout","General");
    if(metas.style === "inherit"){
        var parentMeta = data._this.getParentMeta("layout","General");
        if(!_.isEmpty(parentMeta)){
            metas.style = parentMeta.style;
            metas.secondLineTextColor = parentMeta.secondLineTextColor;
            metas.video = parentMeta.video;
            metas.image = parentMeta.image;
            metas.title = parentMeta.title;
            metas.subTitle = parentMeta.subTitle;
            metas.firstLineText = parentMeta.firstLineText;
            metas.secondLineText = parentMeta.secondLineText;
            metas.firstLineTextColor = parentMeta.firstLineTextColor;
            metas.secondLineTextColor = parentMeta.secondLineTextColor;
            metas.slider = parentMeta.slider;
            metas.template = parentMeta.template;
            metas.beforeFooter = parentMeta.beforeFooter;
            metas.blockHeroImage = parentMeta.blockHeroImage;
            metas.articleRecommendations = parentMeta.articleRecommendations;
            metas.beforeFooterCustomClass = parentMeta.beforeFooterCustomClass;
            metas.headerStyle = parentMeta.headerStyle;
            metas.afterPageTitle = parentMeta.afterPageTitle;
        }
    }
    data._this.setHeader(metas.headerStyle);
    document.documentElement.style
    .setProperty('--page-header-second-line-text-color', metas.secondLineTextColor);
    %>
    <%if(_.isUndefined(metas.style) || _.isEmpty(metas.style) || metas.style == "inherit" || metas.style == "disabled"){%>
        <%=data._this.renderPageTitle(data,metas)%>
    <%}%>

    <%if(metas.style === "video"){%>
        <%=data._this.renderPageTitle(data,metas,"video")%>
    <%}%>
    <%if(metas.style === "image"){%>
        <%=data._this.renderPageTitle(data,metas,"image")%>
    <%}%>
    <%if(metas.style === "textImage"){%>
        <%=data._this.renderPageTitle(data,metas,"text-image")%>
    <%}%>
    <%if(metas.style === "blockImage"){%>
        <%=data._this.renderPageTitle(data,metas,"block-image")%>
    <%}%>
    <%if(metas.style === "twoLinesTextImage"){%>
        <%=data._this.renderPageTitle(data,metas,"two-lines-text-image")%>
    <%}%>

    <!-- Page Header Slider Style -->

    <%if(metas.style === "slider"){%>
        <%=data._this.renderPageTitle(data,metas,"slider")%>
    <%}%>
    <!-- Page Header Slider Style -->
    <%if(!_.isUndefined(metas.afterPageTitle) && metas.afterPageTitle != ""){%>
    <div class="data-uk-content_builder_render after-page-title" data-uk-content_builder_render=""></div>
    <%}%>
    <!-- Breadcrumbs -->
    <%=metas.breadcrumbs ? bjb.renderBreadcrumbs(data.postHierarchy) : ""%>
    <%if(_.isUndefined(data.subNavs) || data.subNavs == null || (!_.isUndefined(data.subNavs) && data.subNavs != null && data.subNavs.length < 1)){%>
    <div class="blog-main-content"></div>
    <%}%>
    <%if(!_.isUndefined(data.subNavs) && data.subNavs != null && data.subNavs.length > 0){%>
    <section class="uk-section">
        <div class="uk-container">
            <div class="uk-grid-large" data-uk-grid>
                <div class="uk-width-1-3@m">
                    <div class="active-sticky-zero-z-index" uk-sticky="end: !.uk-grid;offset:100;media:@m">
                        <ul class="single-post-subnav uk-nav uk-nav-default uk-hidden" uk-switcher="connect:#main-content-single-page;toggle:> li a.ef-content-switch">
                            <%_.each(data.subNavs, function(subNav){%>
                            <li class="<%=data.id == subNav.id ? " uk-active" : "" %>">
                                <a 
                                    class="single-post-subnav-link <%=_.isEmpty(subNav.redirectUri) ? "ef-content-switch" : ""%>" 
                                    href="<%=!_.isEmpty(subNav.redirectUri) ? subNav.redirectUri : "#"%>"
                                    target="<%=!_.isEmpty(subNav.redirectUri) ? "_blank" : ""%>""
                                >
                                    <span class="single-post-subnav-link-icon uk-margin-right"></span>
                                    <%=subNav.title%>
                                </a>
                                <hr/>
                            </li>
                            <%})%>
                        </ul>
                        <div class="single-post-subnav-mobile uk-inline uk-width-1-1">
                            <button class="uk-button uk-button-default uk-button-default-dark uk-width-1-1 uk-flex uk-flex-between uk-flex-middle" type="button" data-uk-toggle="target:!.single-post-subnav-mobile .uk-card-body;cls:uk-hidden">
                                <span>
                                    <%=!_.isUndefined(_.findWhere(data.subNavs, {id: data.id})) ? _.findWhere(data.subNavs, {id: data.id}).title : data.subNavs[0].title%>
                                </span> 
                                <span uk-drop-parent-icon></span>
                            </button>
                            <div class="uk-card uk-card-body uk-card-default uk-width-1-1 uk-hidden">
                                <ul class="single-post-subnav-mobile-switcher uk-nav uk-nav-default uk-width-1-1" uk-switcher="connect:#main-content-single-page;toggle:> * > a.ef-content-switch">
                                    <%_.each(data.subNavs, function(subNav){%>
                                    <li class="<%=data.id == subNav.id ? " uk-active" : "" %>">
                                        <a class="<%=_.isEmpty(subNav.redirectUri) ? "ef-content-switch" : ""%>" href="<%=!_.isEmpty(subNav.redirectUri) ? subNav.redirectUri : "#"%>"><%=subNav.title%></a>
                                    </li>
                                    <%})%>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="uk-width-2-3@m">
                    <ul class="uk-switcher" id="main-content-single-page">
                        <%_.each(data.subNavs, function(subNav){%>
                        <li class="<%=data.id == subNav.id ? " uk-active" : "" %>">
                            <div data-subnav-id="<%=subNav.id%>" class="data-uk-content_builder_render blog-subnav-content" data-uk-content_builder_render></div>
                        </li>
                        <%})%>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <%}%>
    <%if(!metas.articleRecommendations){%>
    <section class="uk-section uk-section-muted">
        <div class="uk-container">
            <h3 class="uk-h3"> Berita Lainnya </h3>
            <div data-uk-ef_blog_posts="post-type:News;mode:slider;limit:10;is-pagination:false"></div>
        </div>
    </section>
    <%}%>
    
    <%if(!_.isUndefined(metas.beforeFooter) && !_.isEmpty(metas.beforeFooter) ){
    var block = metas.beforeFooter.split("|")[0];
    %>
        <div data-uk-ef_blog_post="post-type-slug:<%=block%>;post-type:Block;" class="<%=!_.isEmpty(metas.beforeFooterCustomClass) ? metas.beforeFooterCustomClass : "" %>"></div>
    <%}%>
</script>
    <script type="text/template" id="template-content-builder-render-single-post-product">
   <%
    var metas = data._this.getMeta("layout","General");
    if(metas.style === "inherit"){
        var parentMeta = data._this.getParentMeta("layout","General");
        if(!_.isEmpty(parentMeta)){
            metas.style = parentMeta.style;
            metas.secondLineTextColor = parentMeta.secondLineTextColor;
            metas.video = parentMeta.video;
            metas.image = parentMeta.image;
            metas.title = parentMeta.title;
            metas.subTitle = parentMeta.subTitle;
            metas.firstLineText = parentMeta.firstLineText;
            metas.secondLineText = parentMeta.secondLineText;
            metas.firstLineTextColor = parentMeta.firstLineTextColor;
            metas.secondLineTextColor = parentMeta.secondLineTextColor;
            metas.slider = parentMeta.slider;
            metas.template = parentMeta.template;
            metas.beforeFooter = parentMeta.beforeFooter;
            metas.articleRecommendations = parentMeta.articleRecommendations;
            metas.beforeFooterCustomClass = parentMeta.beforeFooterCustomClass;
            metas.headerStyle = parentMeta.headerStyle;
            metas.afterPageTitle = parentMeta.afterPageTitle;
            metas.sliderHeight = parentMeta.sliderHeight;
            metas.sliderCustomRatio = parentMeta.sliderCustomRatio;
            metas.sliderRatio = parentMeta.sliderRatio;
        }
    }
    document.documentElement.style
    .setProperty('--page-header-second-line-text-color', metas.secondLineTextColor);
    %>
    <%if(_.isUndefined(metas.style) || _.isEmpty(metas.style) || metas.style == "inherit" || metas.style == "disabled"){%>
        <%=data._this.renderPageTitle(data,metas)%>
    <%}%>

    <%if(metas.style === "video"){%>
        <%=data._this.renderPageTitle(data,metas,"video")%>
    <%}%>
    <%if(metas.style === "image"){%>
        <%=data._this.renderPageTitle(data,metas,"image")%>
    <%}%>
    <%if(metas.style === "textImage"){%>
        <%=data._this.renderPageTitle(data,metas,"text-image")%>
    <%}%>
    <%if(metas.style === "blockImage"){%>
        <%=data._this.renderPageTitle(data,metas,"block-image")%>
    <%}%>
    <%if(metas.style === "twoLinesTextImage"){%>
        <%=data._this.renderPageTitle(data,metas,"two-lines-text-image")%>
    <%}%>

    <!-- Page Header Slider Style -->

    <%if(metas.style === "slider"){%>
        <%=data._this.renderPageTitle(data,metas,"slider")%>
    <%}%>
    <!-- Breadcrumbs -->
    <%=metas.breadcrumbs ? bjb.renderBreadcrumbs(data.postHierarchy) : ""%>
    <%if(_.isUndefined(data.subNavs) || data.subNavs == null || (!_.isUndefined(data.subNavs) && data.subNavs != null && data.subNavs.length < 1)){%>
    <div class="blog-main-content"></div>
    <%}%>
    <%if(!_.isUndefined(data.subNavs) && data.subNavs != null && data.subNavs.length > 0){%>
    <section class="uk-section">
        <div class="uk-container">
            <div class="" data-uk-grid>
                <div class="uk-width-1-3@m uk-visible@m">
                    <div class="active-sticky-zero-z-index" uk-sticky="end: !.uk-grid;offset:100;media:@m;">
                        <ul class="single-post-subnav uk-nav uk-nav-default" uk-switcher="connect:#main-content-single-page">
                            <%_.each(data.subNavs, function(subNav){%>
                            <li class="<%=data.id == subNav.id ? " uk-active" : "" %>">
                                <a class="single-post-subnav-link" href="#"><span class="single-post-subnav-link-icon uk-margin-right"></span><%=subNav.title%></a>
                                <hr/>
                            </li>
                            <%})%>
                        </ul>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-hidden@m">
                    <div class="single-post-subnav-mobile uk-inline uk-width-1-1">
                        <button class="uk-button uk-button-primary uk-width-1-1 uk-flex uk-flex-between uk-flex-middle" type="button">
                            <span>
                                <%=!_.isUndefined(_.findWhere(data.subNavs, {id: data.id})) ? _.findWhere(data.subNavs, {id: data.id}).title : data.subNavs[0].title%>
                            </span> 
                            <span uk-drop-parent-icon></span>
                        </button>
                        <div class="uk-card uk-card-body uk-card-default uk-width-1-1" uk-drop="mode: click;stretch:x;">
                            <ul class="single-post-subnav-mobile-switcher uk-nav uk-nav-default uk-width-1-1" uk-switcher="connect:#main-content-single-page;toggle:> * > a.ef-content-switch">
                                <%_.each(data.subNavs, function(subNav){%>
                                <li class="<%=data.id == subNav.id ? " uk-active" : "" %>">
                                    <a class="<%=_.isEmpty(subNav.redirectUri) ? "ef-content-switch" : ""%>" href="<%=!_.isEmpty(subNav.redirectUri) ? subNav.redirectUri : "#"%>"><%=subNav.title%></a>
                                </li>
                                <%})%>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="uk-width-2-3@m">
                    <ul class="uk-switcher" id="main-content-single-page">
                        <%_.each(data.subNavs, function(subNav){%>
                        <li class="<%=data.id == subNav.id ? " uk-active" : "" %>">
                            <div data-subnav-id="<%=subNav.id%>" class="data-uk-content_builder_render blog-subnav-content" data-uk-content_builder_render></div>
                        </li>
                        <%})%>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <%}%>
    <%if(!metas.articleRecommendations){%>
    <section class="uk-section uk-section-muted">
        <div class="uk-container">
            <h3 class="uk-h3"> Berita Lainnya </h3>
            <div data-uk-ef_blog_posts="post-type:News;mode:slider;limit:10;is-pagination:false"></div>
        </div>
    </section>
    <%}%>
    
    <%if(!_.isUndefined(metas.beforeFooter) && !_.isEmpty(metas.beforeFooter) ){
    var block = metas.beforeFooter.split("|")[0];
    %>
        <div data-uk-ef_blog_post="post-type-slug:<%=block%>;post-type:Block;"></div>
    <%}%>
</script>
    <script type="text/template" id="template-content-builder-render-single-post-style-1-product">
    <%
    var metas = data._this.getMeta("layout","General");
    if(metas.style === "inherit"){
    var parentMeta = data._this.getParentMeta("layout","General");
    if(!_.isEmpty(parentMeta)){
    metas.style = parentMeta.style;
    metas.secondLineTextColor = parentMeta.secondLineTextColor;
    metas.video = parentMeta.video;
    metas.image = parentMeta.image;
    metas.title = parentMeta.title;
    metas.subTitle = parentMeta.subTitle;
    metas.firstLineText = parentMeta.firstLineText;
    metas.secondLineText = parentMeta.secondLineText;
    metas.firstLineTextColor = parentMeta.firstLineTextColor;
    metas.secondLineTextColor = parentMeta.secondLineTextColor;
    metas.slider = parentMeta.slider;
    }
    }
    document.documentElement.style
    .setProperty('--page-header-second-line-text-color', metas.secondLineTextColor);
    %>
    <%if(_.isUndefined(metas.style) || _.isEmpty(metas.style) || metas.style == "inherit" || metas.style == "disabled"){%>
        <%=data._this.renderPageTitle(data,metas)%>
    <%}%>

    <%if(metas.style === "video"){%>
        <%=data._this.renderPageTitle(data,metas,"video")%>
    <%}%>
    <%if(metas.style === "image"){%>
        <%=data._this.renderPageTitle(data,metas,"image")%>
    <%}%>
    <%if(metas.style === "textImage"){%>
        <%=data._this.renderPageTitle(data,metas,"text-image")%>
    <%}%>
    <%if(metas.style === "blockImage"){%>
        <%=data._this.renderPageTitle(data,metas,"block-image")%>
    <%}%>
    <%if(metas.style === "twoLinesTextImage"){%>
        <%=data._this.renderPageTitle(data,metas,"two-lines-text-image")%>
    <%}%>

    <!-- Page Header Slider Style -->

    <%if(metas.style === "slider"){%>
        <%=data._this.renderPageTitle(data,metas,"slider")%>
    <%}%>
    <!-- Breadcrumbs -->
    <%=metas.breadcrumbs ? bjb.renderBreadcrumbs(data.postHierarchy) : ""%>
    <%if(_.isUndefined(data.subNavs) || data.subNavs == null || (!_.isUndefined(data.subNavs) && data.subNavs != null && data.subNavs.length < 1)){%>
    <div class="blog-main-content"></div>
    <%}%>
    <%if(!_.isUndefined(data.subNavs) && data.subNavs != null && data.subNavs.length > 0){%>
    <section class="uk-section">
        <div class="uk-container">
            <ul class="uk-flex-center" uk-tab>
                <%_.each(data.subNavs, function(subNav){%>
                <li class="<%=data.id == subNav.id ? " uk-active" : "" %>"><a href="#"><%=subNav.title%></a></li>
                <%})%>
            </ul>
            <ul class="uk-switcher uk-margin">
                <%_.each(data.subNavs, function(subNav){%>
                <li class="<%=data.id == subNav.id ? " uk-active" : "" %>
                    ">
                    <div data-subnav-id="<%=subNav.id%>" class="data-uk-content_builder_render blog-subnav-content" data-uk-content_builder_render></div>
                </li>
                <%})%>
            </ul>
        </div>
    </section>
    <%}%>
    <%if(!metas.articleRecommendations){%>
    <section class="uk-section uk-section-muted">
        <div class="uk-container">
            <h3 class="uk-h3"> Berita Lainnya </h3>
            <div data-uk-ef_blog_posts="post-type:News;mode:slider;limit:10;is-pagination:false"></div>
        </div>
    </section>
    <%}%>
    <%if(!_.isUndefined(metas.beforeFooter) && !_.isEmpty(metas.beforeFooter) ){
    var block = metas.beforeFooter.split("|")[0];
    %>
        <div data-uk-ef_blog_post="post-type-slug:<%=block%>;post-type:Block;"></div>
    <%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-walker">
<div class="uk-grid uk-child-width-1-2@s uk-grid-match is-card-loop" data-uk-grid data-uk-height-match="target: > div > a > .uk-card > .uk-card-body">
	<%_.each(data.posts, function(post){%>
	<%var meta = bjb.getMeta(post.metas, "custom","General")%>
	<div class="<%=data._this.column%>">
		<a <%=bjb.getAttr({
			class:[ 'uk-link-reset' ],
			href:[(meta.useRedirectLink === true ? meta.redirectLink : bjb.getPostUrl(post.postTypeSlug))],
			target:[meta.useRedirectLink === true && meta.newTab === true ? "_blank" : "_self"],

		})%>>
		  <div class="uk-card uk-card-default uk-card-small uk-card-hover">
			<%if(post.thumbnailImage !== null && post.thumbnailImage !== ""){%>
			<div class="uk-card-media-top">
				<img data-src="<%=bjb.getImageSrc(post.thumbnailImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.thumbnailImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-transition-scale-down uk-transition-opaque" data-uk-img/>
			</div>
			<%} else if(post.featuredImage !== null && post.featuredImage !== "") {%>
				<div class="uk-card-media-top">
					<img data-src="<%=bjb.getImageSrc(post.featuredImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.featuredImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-transition-scale-down uk-transition-opaque" data-uk-img/>
				</div>
			<%}%>
			<div class="uk-card-body">
				  <p class="uk-text-meta">
					<%if(meta.useCustomPostDate === true){%>
					<span data-uk-ef_date_label="date:<%=meta.postDate%>;format:DD/MM/YYYY"></span>
					<%} else {%>
					<span data-uk-ef_date_label="date:<%=post.createdDate%>;"></span>
					<%}%> 
					<%if(!_.isEmpty(post.categories)){%>
					<span data-uk-icon="icon: icon-separator; ratio: .7;" class="uk-icon">
					</span>
					<%}%>
					<%=bjb.getCategory(post.categories)%> 
				</p>
			  <h3 class="uk-card-title"><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
			</div>
			<div class="uk-card-footer">
			  <p class="uk-button uk-button-text">Selengkapnya </p>
			</div>
		  </div>
		</a>
	</div>
	<%})%>
</div>
<%if(data._this.isPagination){%>
<div class="uk-margin" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-style-2-walker">
<div class="uk-grid uk-grid-small" data-uk-grid>
	<%_.each(data.posts, function(post){%>
	<%var meta = bjb.getMeta(post.metas, "custom","General")%>
	<div class="<%=data._this.column%> uk-width-1-2">
		<a <%=bjb.getAttr({
			class:[ 'uk-link-reset' ],
			href:[(meta.useRedirectLink === true ? meta.redirectLink : bjb.getPostUrl(post.postTypeSlug))],
			target:[meta.useRedirectLink === true && meta.newTab === true ? "_blank" : "_self"],

		})%>>
			<div class="uk-inline uk-background-cover uk-background-center-center" style="width:188px;height:224px;background-image:url(
				<%if(post.thumbnailImage !== null && post.thumbnailImage !== ""){%>
					<%=bjb.endpoints.FILE_CLIENT%>/<%=post.thumbnailImage%>
				<%} else if(post.featuredImage !== null && post.featuredImage !== "") {%>
					<%=bjb.endpoints.FILE_CLIENT%>/<%=post.featuredImage%>
				<%}%>)"
			>
				<div class="uk-overlay-primary uk-position-cover"></div>
				<div class="uk-overlay uk-light uk-position-small uk-position-bottom-left uk-padding-remove">
					<%=bjb.getPostTitle(post.title, post.i81n)%>
				</div>
			</div>
		</a>
	</div>
	<%})%>
</div>
<%if(data._this.isPagination){%>
<div class="uk-margin" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-slider-style-2-walker">

    <div class="uk-slider-container-offset uk-position-relative" uk-slider="autoplay:true;autoplay-interval:8000;">

		<ul class="uk-slider-items uk-grid-match uk-margin-bottom is-card-loop" data-uk-grid data-uk-height-match="target: > li > a > .uk-card > .uk-card-body">
			<%_.each(data.posts, function(post){%>
			<%var meta = bjb.getMeta(post.metas, "custom","General")%>
			<li class="uk-width-1-1@m">
				<a <%=bjb.getAttr({
					class:[ 'uk-link-reset' ],
					href:[(meta.useRedirectLink === true ? meta.redirectLink : bjb.getPostUrl(post.postTypeSlug))],
					target:[meta.useRedirectLink === true && meta.newTab === true ? "_blank" : "_self"],

				})%>>
					<div class="uk-card uk-card-default uk-grid-collapse" data-uk-grid >
						<%if(post.thumbnailImage !== null && post.thumbnailImage !== ""){%>
							<div class="uk-card-media-left uk-width-1-2@m uk-background-cover uk-flex-last@m uk-height-large" data-src="<%=bjb.getImageSrc(post.thumbnailImage)%>" uk-img="loading: eager"></div>
						<%} else if(post.featuredImage !== null && post.featuredImage !== "") {%>
							<div class="uk-card-media-left uk-width-1-2@m uk-background-cover uk-flex-last@m uk-height-large" data-src="<%=bjb.getImageSrc(post.featuredImage)%>" uk-img="loading: eager"></div>
						<%}%>
						<div class="uk-width-1-2@m uk-flex uk-flex-middle">
							<div class="uk-card-body">
								<span class="uk-text-meta uk-margin-small-bottom">
									<%=bjb.getCategory(post.categories)%>
								</span>
								<h4 class="uk-margin-remove-top"><%=bjb.getPostTitle(post.title, post.i81n)%></h4>
								<p><%=bjb.getPostExcerpt(post.excerpt, post.i81n)%></p>
								<span class="uk-button uk-button-text">Selengkapnya </span>
							</div>
						</div>
					</div>
				</a>
			</li>
			<%})%>
		</ul>
		<a class="uk-position-center-left uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
		<a class="uk-position-center-right uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-next uk-slider-item="next"></a>
	</div>

    <%if(data._this.isPagination){%>
    <div class="uk-margin" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
    <%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-slider-style-3-walker">

    <div class="uk-position-relative uk-padding-medium-top -uk-margin-medium-top uk-slider-container-offset" tabindex="-1" uk-slider>
        <ul class="uk-slider-items uk-grid-match uk-margin-bottom is-card-loop" data-uk-grid data-uk-height-match="target: > li > a > .uk-card > .uk-card-body">
            <%_.each(data.posts, function(post){%>
			<%var meta = bjb.getMeta(post.metas, "custom","General")%>
            <li class="<%=data._this.column%>">
				<a <%=bjb.getAttr({
					class:[ 'uk-link-reset' ],
					href:[(meta.useRedirectLink === true ? meta.redirectLink : bjb.getPostUrl(post.postTypeSlug))],
					target:[meta.useRedirectLink === true && meta.newTab === true ? "_blank" : "_self"],

				})%>>
				<div class="uk-card uk-card-default uk-card-small uk-card-hover">
					<div class="uk-card-body">
						<p class="uk-text-meta">
							<%if(meta.useCustomPostDate === true){%>
							<span data-uk-ef_date_label="date:<%=meta.postDate%>;format:DD/MM/YYYY"></span>
							<%} else {%>
							<span data-uk-ef_date_label="date:<%=post.createdDate%>;"></span>
							<%}%>
							<%if(!_.isEmpty(post.categories)){%>
							<span data-uk-icon="icon: icon-separator; ratio: .7;" class="uk-icon">
							</span>
							<%}%>
							<%=bjb.getCategory(post.categories)%>
						</p>
						<h3 class="uk-card-title"><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
					</div>
					<div class="uk-card-footer">
						<p class="uk-button uk-button-text">Selengkapnya </p>
					</div>
				</div>
				</a>
            </li>
            <%})%>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>
    <%if(data._this.isPagination){%>
    <div class="uk-margin" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
    <%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-walker-prestasi">
<%if(data.posts.length > 0){%>
	<%if(_.isEmpty(data.style)){%>
		<div class="uk-grid uk-grid-small uk-grid-divider" data-uk-grid>
			<%_.each(data.posts, function(post){%>
			<% var meta = bjb.getMeta(post.metas, "custom","General");%>
			<div class="uk-width-1-1">
				<div data-uk-grid>
					<div class="uk-width-expand">
						<h5 class="uk-margin-small-bottom"><%=bjb.getPostTitle(post.title, post.i81n)%></h5>
						<h5 class="uk-text-muted uk-margin-remove-vertical">Image</h5>
					</div>
					<div class="uk-width-auto">
						<%if(meta.showContent === true){%>
						<a <%=bjb.getAttr({
							class:[ 'uk-inline uk-transition-toggle' ],
							href:"#",
							target:["_self"],
							"data-uk-ef_modal_post_button":"template-id:template-content-builder-render-modal-post;post-slug:"+post.postTypeSlug+";"
						})%>>View</a>
						<%} else {%>
						<a class="uk-inline uk-transition-toggle lightbox-link" href="<%=bjb.endpoints.FILE_CLIENT+"/"+post.featuredImage%>" data-caption="<%=post.title%>">
							View
						</a>
						<%}%>
					</div>
				</div>
			</div>
			<%})%>
		</div>
	<%} else {%>
		<div class="uk-grid uk-grid-match is-card-loop" data-uk-grid data-uk-height-match="target: > div > a > .uk-card > .uk-card-body">
			<%_.each(data.posts, function(post){%>
			<%var meta = bjb.getMeta(post.metas, "custom","General")%>
			<div class="<%=data._this.column%>" <%if(meta.showContent !== true){%>data-uk-lightbox="animation: fade"<%}%>>
				<%if(meta.showContent === true){%>
				<a <%=bjb.getAttr({
					class:[ 'uk-link-reset' ],
					href:"#",
					target:["_self"],
					"data-uk-ef_modal_post_button":"template-id:template-content-builder-render-modal-post;post-slug:"+post.postTypeSlug+";"
				})%>>
				<%} else {%>
				<a class="uk-inline uk-transition-toggle" href="<%=bjb.endpoints.FILE_CLIENT+"/"+post.featuredImage%>" data-caption="<%=post.title%>">
				<%}%>
				<div class="uk-card uk-card-default uk-card-small uk-card-hover">
					<%if(post.thumbnailImage !== null && post.thumbnailImage !== ""){%>
					<div class="uk-card-media-top">
							<img data-src="<%=bjb.getImageSrc(post.thumbnailImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.thumbnailImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-transition-scale-down uk-transition-opaque" data-uk-img/>
					</div>
					<%} else if(post.featuredImage !== null && post.featuredImage !== "") {%>
						<div class="uk-card-media-top">
								<img data-src="<%=bjb.getImageSrc(post.featuredImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.featuredImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-transition-scale-down uk-transition-opaque" data-uk-img/>
						</div>
					<%}%>
					<div class="uk-card-body">
						<p class="uk-text-meta">
							<%if(meta.useCustomPostDate === true){%>
							<span data-uk-ef_date_label="date:<%=meta.postDate%>;format:DD/MM/YYYY"></span>
							<%} else {%>
							<span data-uk-ef_date_label="date:<%=post.createdDate%>;"></span>
							<%}%> 
							<span data-uk-icon="icon: icon-separator; ratio: .7;" class="uk-icon">
							</span>Prestasi 
						</p>
					<h3 class="uk-card-title"><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
					</div>
					<div class="uk-card-footer">
					<p class="uk-button uk-button-text">Selengkapnya </p>
					</div>
				</div>
				</a>
			</div>
			<%})%>
		</div>
	<%}%>

	<%if(data._this.isPagination){%>
	<div class="uk-margin" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
	<%}%>

	<%} else {%>
		<div class="uk-placeholder uk-flex uk-flex-center uk-flex-middle uk-height-small"><span class="uk-h5">Data Tidak Ditemukan</span></div>
	<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-walker-asset">
<%if(data.posts.length > 0){%>
	<div class="uk-grid-small uk-grid-divider" data-uk-grid>
		<%_.each(data.posts, function(post){%>
		<%
			var meta = bjb.getMeta(post.metas, "custom","General"),
				availableAsset = !_.isEmpty(post.featuredImage),
				availableEngFile = !_.isEmpty(meta.engFile),
				availableAudio = !_.isEmpty(meta.audioLink),
				availableVideo = !_.isEmpty(meta.videoLink),
				availablenewsPaperId = !_.isEmpty(meta.newsPaperId),
				availablenewsPaperEn = !_.isEmpty(meta.newsPaperEn),
				availablefullVersionId = !_.isEmpty(meta.fullVersionId),
				availablefullVersionEn = !_.isEmpty(meta.fullVersionEn),
				availablecorporatePresentationId = !_.isEmpty(meta.corporatePresentationId),
				availablecorporatePresentationEn = !_.isEmpty(meta.corporatePresentationEn);
				availableTahunan = !_.isEmpty(meta.tahunan);
				availableKeberlanjutan = !_.isEmpty(meta.keberlanjutan);
				availableLcr = !_.isEmpty(meta.lcr);
				availableNsfr = !_.isEmpty(meta.nsfr);
				availableRasioPengungkit = !_.isEmpty(meta.rasioPengungkit);
				availableGcg = !_.isEmpty(meta.gcg);
				availableGcgEng = !_.isEmpty(meta.gcgEng);
				availableTerintegrasi = !_.isEmpty(meta.terintegrasi);
		%>
		<div class="uk-width-1-1">
			<div data-uk-grid>
				<div class="uk-width-expand">
					<h5><%=bjb.getPostTitle(post.title, post.i81n)%></h5>
				</div>
				<div class="uk-width-auto">
					<div class="uk-grid-divider uk-grid-small uk-child-width-auto uk-flex-right ef-asset-icon" data-uk-grid>
						<%if(data._this.assetType == "triwulan"){%>
							<%if(availablefullVersionId){%>
								<div><a target="_blank" href="<%=bjb.endpoints.FILE_CLIENT+"/"+meta.fullVersionId%>" data-uk-icon="icon:icon-full-file" uk-tooltip="title:Full Version"></a></div>
							<%} else {%>
								<div><span class="uk-text-muted" data-uk-icon="icon:icon-full-file" uk-tooltip="title:Laporan Full Version Belum Tersedia"></span></div>
							<%}%>

							<%if(availablenewsPaperId){%>
								<div><a target="_blank" href="<%=bjb.endpoints.FILE_CLIENT+"/"+meta.newsPaperId%>" data-uk-icon="icon:icon-pdf-file" uk-tooltip="title:Newspaper Version"></a></div>
							<%} else {%>
								<div><span class="uk-text-muted" data-uk-icon="icon:icon-pdf-file" uk-tooltip="title:Laporan Nespaper Version Belum Tersedia"></span></div>
							<%}%>

							<%if(availablenewsPaperEn){%>
								<div><a target="_blank" href="<%=bjb.endpoints.FILE_CLIENT+"/"+meta.newsPaperEn%>" data-uk-icon="icon:icon-pdf-file" uk-tooltip="title:Newspaper English Version"></a></div>
							<%}%>

							<%if(availablecorporatePresentationId){%>
								<div lang="id"><a target="_blank" href="<%=bjb.endpoints.FILE_CLIENT+"/"+meta.corporatePresentationId%>" data-uk-icon="icon:icon-ppt-file" uk-tooltip="title:Corporate Presentation"></a></div>
							<%}%>

							<%if(availablecorporatePresentationEn){%>
								<div lang="en"><a target="_blank" href="<%=bjb.endpoints.FILE_CLIENT+"/"+meta.corporatePresentationEn%>" data-uk-icon="icon:icon-ppt-file" uk-tooltip="title:Corporate Presentation"></a></div>
							<%} else {%>
								<div lang="en"><span class="uk-text-muted" data-uk-icon="icon:icon-ppt-file" uk-tooltip="title:Laporan Corporate Presentation Belum Tersedia"></span></div>
							<%}%>

							<%if(availableVideo){%>
								<div>
									<a class="uk-text-primary" uk-icon="icon: icon-video-file" data-video-link="<%=meta.videoLink%>" data-uk-ef_modal_video_button></a>
								</div>
							<%} else {%>
								<div><span class="uk-text-muted" data-uk-icon="icon:icon-video-file" uk-tooltip="title:Laporan Video Belum Tersedia"></span></div>
							<%}%>

							<%if(availableAudio){%>
								<div><a  class="uk-text-primary" data-video-link="<%=meta.audioLink%>" uk-icon="icon: icon-audio-file" data-uk-ef_modal_video_button></a></div>
							<%} else {%>
								<div><span class="uk-text-muted" data-uk-icon="icon:icon-audio-file" uk-tooltip="title:Laporan Audio Belum Tersedia"></span></div>
							<%}%>

						<%}%>
						<%if(data._this.assetType == "tahunan"){%>
							<%if(availableTahunan){%>
								<div><a target="_blank" href="<%=bjb.endpoints.FILE_CLIENT+"/"+meta.tahunan%>" data-uk-icon="icon:icon-full-file" uk-tooltip="title:Laporan Tahunan"></a></div>
							<%} else {%>
								<div><span class="uk-text-muted" data-uk-icon="icon:icon-full-file" uk-tooltip="title:Laporan Tahunan Belum Tersedia"></span></div>
							<%}%>

							<%if(availableKeberlanjutan){%>
								<div><a target="_blank" href="<%=bjb.endpoints.FILE_CLIENT+"/"+meta.keberlanjutan%>" data-uk-icon="icon:icon-full-file" uk-tooltip="title:Laporan Keberlanjutan"></a></div>
							<%} else {%>
								<div><span class="uk-text-muted" data-uk-icon="icon:icon-full-file" uk-tooltip="title:Laporan Keberlanjutan Belum Tersedia"></span></div>
							<%}%>
						<%}%>

						<%if(data._this.assetType == "likuiditas"){%>

							<%if(availableLcr){%>
							<div><a target="_blank" href="<%=bjb.endpoints.FILE_CLIENT+"/"+meta.lcr%>" data-uk-icon="icon:icon-full-file" uk-tooltip="title:Laporan LCR"></a></div>
							<%} else {%>
								<div><span class="uk-text-muted" data-uk-icon="icon:icon-full-file" uk-tooltip="title:Laporan LCR Belum Tersedia"></span></div>
							<%}%>

							<%if(availableNsfr){%>
								<div><a target="_blank" href="<%=bjb.endpoints.FILE_CLIENT+"/"+meta.nsfr%>" data-uk-icon="icon:icon-full-file" uk-tooltip="title:Laporan NSFR"></a></div>
							<%} else {%>
								<div><span class="uk-text-muted" data-uk-icon="icon:icon-full-file" uk-tooltip="title:Laporan NSFR Belum Tersedia"></span></div>
							<%}%>

							<%if(availableRasioPengungkit){%>
								<div><a target="_blank" href="<%=bjb.endpoints.FILE_CLIENT+"/"+meta.rasioPengungkit%>" data-uk-icon="icon:icon-full-file" uk-tooltip="title:Laporan Rasio Pengungkit"></a></div>
							<%} else {%>
								<div><span class="uk-text-muted" data-uk-icon="icon:icon-full-file" uk-tooltip="title:Laporan Rasio Pengungkit Belum Tersedia"></span></div>
							<%}%>

						<%}%>

						<%if(availableGcg){%>
							<div lang="id"><a target="_blank" href="<%=bjb.endpoints.FILE_CLIENT+"/"+meta.gcg%>" data-uk-icon="icon:icon-full-file" uk-tooltip="title:Laporan GCG bpr emas" ></a></div>
						<%}%>

						<%if(availableGcgEng){%>
							<div lang="en"><a target="_blank" href="<%=bjb.endpoints.FILE_CLIENT+"/"+meta.gcgEng%>" data-uk-icon="icon:icon-full-file" uk-tooltip="title:Laporan GCG bpr emas" ></a></div>
						<%}%>

						<%if(availableTerintegrasi){%>
							<div><a target="_blank" href="<%=bjb.endpoints.FILE_CLIENT+"/"+meta.terintegrasi%>" data-uk-icon="icon:icon-full-file" uk-tooltip="title:Laporan GCG Terintegrasi"></a></div>
						<%}%>
						<%if(availableEngFile){%>
							<div><a target="_blank" href="<%=bjb.endpoints.FILE_CLIENT+"/"+meta.engFile%>" data-uk-icon="icon:icon-full-file" uk-tooltip="title:English Version"></a></div>
						<%}%>
						<%if(availableAsset){%>
							<div><a target="_blank" href="<%=bjb.endpoints.FILE_CLIENT+"/"+post.featuredImage%>" data-uk-icon="icon:icon-full-file" uk-tooltip="title:Indonesian Version"></a></div>
						<%}%>
					</div>
				</div>
			</div>
		</div>
		<%})%>
	</div>
	<%if(data._this.isPagination){%>
	<div class="uk-margin" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
	<%}%>
<%} else {%>
	<div class="uk-placeholder uk-flex uk-flex-center uk-flex-middle uk-height-small"><span class="uk-h5">Data Tidak Ditemukan</span></div>
<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-style-1-walker-asset">
<%if(data.posts.length > 0){%>
	<ul class="uk-subnav-pill uk-grid-small uk-flex uk-padding-remove uk-width-1-1" data-uk-grid>
		<%_.each(data.posts, function(post){%>
		<%
			var meta = bjb.getMeta(post.metas, "custom","General"),
				availableAsset = !_.isEmpty(post.featuredImage),
				availableEngFile = !_.isEmpty(meta.engFile),
				availableAudio = !_.isEmpty(meta.audioLink),
				availableVideo = !_.isEmpty(meta.videoLink),
				availablenewsPaperId = !_.isEmpty(meta.newsPaperId),
				availablenewsPaperEn = !_.isEmpty(meta.newsPaperEn),
				availablefullVersionId = !_.isEmpty(meta.fullVersionId),
				availablefullVersionEn = !_.isEmpty(meta.fullVersionEn),
				availablecorporatePresentationId = !_.isEmpty(meta.corporatePresentationId),
				availablecorporatePresentationEn = !_.isEmpty(meta.corporatePresentationEn);
				availableTahunan = !_.isEmpty(meta.tahunan);
				availableKeberlanjutan = !_.isEmpty(meta.keberlanjutan);
				availableLcr = !_.isEmpty(meta.lcr);
				availableNsfr = !_.isEmpty(meta.nsfr);
				availableRasioPengungkit = !_.isEmpty(meta.rasioPengungkit);
				availableGcg = !_.isEmpty(meta.gcg);
				availableGcgEng = !_.isEmpty(meta.gcgEng);
				availableTerintegrasi = !_.isEmpty(meta.terintegrasi);
		%>
		<li class="uk-width-auto">
			<a class="uk-subnav__link" target="_blank" href="<%=bjb.endpoints.FILE_CLIENT+"/"+post.featuredImage%>" uk-tooltip="title:<%=post.title%>">
				<%if(!_.isEmpty(post.tags) && _.isArray(post.tags)){%>
					<%=post.tags[0].displayName%>
				<%}%>
			</a>
		</li>
		<%})%>
	</ul>
	<%if(data._this.isPagination){%>
	<div class="uk-margin" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
	<%}%>
<%} else {%>
	<div class="uk-placeholder uk-flex uk-flex-center uk-flex-middle uk-height-small"><span class="uk-h5">Data Tidak Ditemukan</span></div>
<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-walker-promo">
    <div class="uk-grid uk-grid-match" data-uk-grid data-uk-height-match="target: > div > a > .uk-card > .uk-card-body">
        <%_.each(data.posts, function(post){%>
        <%var meta = bjb.getMeta(post.metas, "custom","General")%>
        <div class="<%=data._this.column%>">
            <a <%=bjb.getAttr({
				class:[ 'uk-link-reset' ],
				href:[(meta.useRedirectLink === true ? meta.redirectLink : bjb.getPostUrl(post.postTypeSlug))],
				target:[meta.useRedirectLink === true && meta.newTab === true ? "_blank" : "_self"],

			})%>>
		<div class="uk-card uk-card-default uk-card-small uk-card-hover">
			<%if(post.thumbnailImage !== null && post.thumbnailImage !== ""){%>
			<div class="uk-card-media-top">
					  <img data-src="<%=bjb.getImageSrc(post.thumbnailImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.thumbnailImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-width-1-1" data-uk-img/>
			</div>
			<%} else if(post.featuredImage !== null && post.featuredImage !== "") {%>
			<div class="uk-card-media-top">
							<img data-src="<%=bjb.getImageSrc(post.featuredImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.featuredImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-width-1-1" data-uk-img/>
			</div>
			<%}%>
			<div class="is-card-overlay">
				<h3><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
				<p class="uk-margin-remove"><%=bjb.getPostExcerpt(post.excerpt, post.i81n)%></p>
				<p class="uk-button uk-button-text uk-margin-auto-top">Info Lebih Lanjut </p>
			</div>
			<div class="uk-card-body">
				<h3 class="uk-card-title"><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
			</div>
			<div class="uk-card-footer">
				<p class="uk-text-meta">
				<span data-uk-icon="icon: icon-clock; ratio: .7;" class="uk-icon"></span>
				<%if(meta.useStartDate === true){%>
				Periode&nbsp;<span data-uk-ef_date_label="date:<%=meta.startDate%>;format:DD/MM/YYYY"></span> - 
				<%} else {%>
				Berlaku Hingga&nbsp;
				<%}%>
				<span data-uk-ef_date_label="date:<%=meta.endDate%>;format:DD/MM/YYYY">
				</p>
			</div>
		</div>
		</a>
        </div>
        <%})%>
    </div>
<%if(data._this.isPagination){%>
<div class="uk-margin-large-top" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-walker-news">
<div class="uk-grid uk-child-width-1-2@s uk-grid-match" data-uk-grid data-uk-height-match="target: > div > a > .uk-card > .uk-card-body">
	<%_.each(data.posts, function(post){%>
	<%var meta = bjb.getMeta(post.metas, "custom","General")%>
	<div class="<%=data._this.column%>">
		<a <%=bjb.getAttr({
			class:[ 'uk-link-reset' ],
			href:[(meta.useRedirectLink === true ? meta.redirectLink : bjb.getPostUrl(post.postTypeSlug))],
			target:[meta.useRedirectLink === true && meta.newTab === true ? "_blank" : "_self"],

		})%>>
		<div class="uk-card uk-card-default uk-card-small uk-card-hover">
			<%if(post.thumbnailImage !== null && post.thumbnailImage !== ""){%>
			<div class="uk-card-media-top">
				<img data-src="<%=bjb.getImageSrc(post.thumbnailImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.thumbnailImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-width-1-1" data-uk-img/>
			</div>
			<%} else if(post.featuredImage !== null && post.featuredImage !== "") {%>
			<div class="uk-card-media-top">
				<img data-src="<%=bjb.getImageSrc(post.featuredImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.featuredImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-width-1-1" data-uk-img/>
			</div>
			<%}%>
			<div class="uk-card-body">
				<p class="uk-text-meta">
					<%if(meta.useCustomPostDate === true){%>
					<span data-uk-ef_date_label="date:<%=meta.postDate%>;format:DD/MM/YYYY"></span>
					<%} else {%>
					<span data-uk-ef_date_label="date:<%=post.createdDate%>;"></span>
					<%}%>
					<span data-uk-icon="icon: icon-separator; ratio: .7;" class="uk-icon">
					</span>
					<%=bjb.getCategory(post.categories, "Berita")%>
				</p>
				<h3 class="uk-card-title"><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
				<p><%=bjb.getPostExcerpt(post.excerpt, post.i81n)%></p>
			</div>
			<div class="uk-card-footer">
				<p class="uk-button uk-button-text">Selengkapnya </p>
			</div>
		</div>
		</a>
	</div> 
	<%})%>
</div>
<%if(data._this.isPagination){%>
<div class="uk-margin-large-top" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-walker-pengumuman">
<div class="uk-grid uk-grid-match is-card-loop" data-uk-grid data-uk-height-match="target: > div > a > .uk-card > .uk-card-body">
	<%_.each(data.posts, function(post){%>
	<%var meta = bjb.getMeta(post.metas, "custom","General")%>
	<div class="<%=data._this.column%>">
		<a <%=bjb.getAttr({
			class:[ 'uk-link-reset' ],
			href:[(meta.useRedirectLink === true ? meta.redirectLink : bjb.getPostUrl(post.postTypeSlug))],
			target:[meta.useRedirectLink === true && meta.newTab === true ? "_blank" : "_self"],

		})%>>
		<div class="uk-card uk-card-default uk-card-small uk-card-hover">
			<div class="uk-card-body">
				<p class="uk-text-meta">
					<%if(meta.useCustomPostDate === true){%>
					<span data-uk-ef_date_label="date:<%=meta.postDate%>;format:DD/MM/YYYY"></span>
					<%} else {%>
					<span data-uk-ef_date_label="date:<%=post.createdDate%>;"></span>
					<%}%>
					<%if(!_.isEmpty(post.categories)){%>
					<span data-uk-icon="icon: icon-separator; ratio: .7;" class="uk-icon">
					</span>
					<%}%>
					<%=bjb.getCategory(post.categories)%>
				</p>
				<h3 class="uk-card-title"><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
			</div>
			<div class="uk-card-footer">
				<p class="uk-button uk-button-text">Selengkapnya </p>
			</div>
		</div>
		</a>
	</div> 
	<%})%>
</div>
<%if(data._this.isPagination){%>
<div class="uk-margin-large-top" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-walker-gallery">
<div class="uk-grid uk-grid-match" data-uk-grid data-uk-height-match="target: > div > a > .uk-card > .uk-card-body">
	<%_.each(data.posts, function(post){%>
	<%var meta = bjb.getMeta(post.metas, "custom","General")%>
	<div class="<%=data._this.column%>">
		<a <%=bjb.getAttr({
			class:[ 'uk-link-reset' ],
			href:[(meta.useRedirectLink === true ? meta.redirectLink : bjb.getPostUrl(post.postTypeSlug))],
			target:[meta.useRedirectLink === true && meta.newTab === true ? "_blank" : "_self"],

		})%>>
		<div class="uk-card uk-card-default uk-card-small uk-card-hover">
			<%if(post.thumbnailImage !== null && post.thumbnailImage !== ""){%>
			<div class="uk-card-media-top">
					<img data-src="<%=bjb.getImageSrc(post.thumbnailImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.thumbnailImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-width-1-1" data-uk-img/>
			</div>
			<%} else if(post.featuredImage !== null && post.featuredImage !== "") {%>
			<div class="uk-card-media-top">
						<img data-src="<%=bjb.getImageSrc(post.featuredImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.featuredImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-width-1-1" data-uk-img/>
			</div>
			<%}%>
			<div class="uk-card-body">
				<p class="uk-text-meta">
					<%if(meta.useCustomPostDate === true){%>
					<span data-uk-ef_date_label="date:<%=meta.postDate%>;format:DD/MM/YYYY"></span>
					<%} else {%>
					<span data-uk-ef_date_label="date:<%=post.createdDate%>;"></span>
					<%}%>
					<span data-uk-icon="icon: icon-separator; ratio: .7;" class="uk-icon">
					</span>
					<%=bjb.getCategory(post.categories, "Galeri")%>
				</p>
				<h3 class="uk-card-title"><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
			</div>
			<div class="uk-card-footer">
				<p class="uk-button uk-button-text">Selengkapnya </p>
			</div>
		</div>
		</a>
	</div> 
	<%})%>
</div>
<%if(data._this.isPagination){%>
<div class="uk-margin-large-top" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-walker-page">
<div class="uk-grid uk-grid-match is-card-loop" data-uk-grid data-uk-height-match="target: > div > a > .uk-card > .uk-card-body">
	<%_.each(data.posts, function(post){%>
	<%var meta = bjb.getMeta(post.metas, "layout","General")%>
	<div class="<%=data._this.column%>">
		<a <%=bjb.getAttr({
			class:[ 'uk-link-reset' ],
			href:[(meta.useRedirectLink === true ? meta.redirectLink : bjb.getPostUrl(post.postTypeSlug))],
			target:[meta.useRedirectLink === true && meta.newTab === true ? "_blank" : "_self"],
			
		})%>>
		  <div class="uk-card uk-card-default uk-card-small uk-card-hover">
			<%if(post.thumbnailImage !== null && post.thumbnailImage !== ""){%>
			<div class="uk-card-media-top">
					  <img data-src="<%=bjb.getImageSrc(post.thumbnailImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.thumbnailImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-transition-scale-down uk-transition-opaque" data-uk-img/>
			</div>
			<%} else if(post.featuredImage !== null && post.featuredImage !== "") {%>
				<div class="uk-card-media-top">
							  <img data-src="<%=bjb.getImageSrc(post.featuredImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.featuredImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-transition-scale-down uk-transition-opaque" data-uk-img/>
				</div>
			<%}%>
			<div class="uk-card-body">
			  <h3 class="uk-card-title"><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
			  <p><%=bjb.getPostExcerpt(post.excerpt, post.i81n)%></p>
			</div>
			<div class="uk-card-footer">
			  <p class="uk-button uk-button-text">Selengkapnya </p>
			</div>
		  </div>
		</a>
	</div>
	<%})%>
</div>
<%if(data._this.isPagination){%>
<div class="uk-margin" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-walker-product">
<div class="uk-grid uk-grid-match is-card-loop" data-uk-grid data-uk-height-match="target: > div > a > .uk-card > .uk-card-body">
	<%_.each(data.posts, function(post){%>
	<%var meta = bjb.getMeta(post.metas, "layout","General")%>
	<div class="<%=data._this.column%>">
		<a <%=bjb.getAttr({
			class:[ 'uk-link-reset' ],
			href:[(meta.useRedirectLink === true ? meta.redirectLink : bjb.getPostUrl(post.postTypeSlug))],
			target:[meta.useRedirectLink === true && meta.newTab === true ? "_blank" : "_self"],

		})%>>
		  <div class="uk-card uk-card-default uk-card-small uk-card-hover">
			<%if(post.thumbnailImage !== null && post.thumbnailImage !== ""){%>
			<div class="uk-card-media-top">
					  <img data-src="<%=bjb.getImageSrc(post.thumbnailImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.thumbnailImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-transition-scale-down uk-transition-opaque" data-uk-img/>
			</div>
			<%} else if(post.featuredImage !== null && post.featuredImage !== "") {%>
				<div class="uk-card-media-top">
						<img data-src="<%=bjb.getImageSrc(post.featuredImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.featuredImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-transition-scale-down uk-transition-opaque" data-uk-img/>
				</div>
			<%}%>
			<div class="uk-card-body">
			  <h3 class="uk-card-title"><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
			  <p><%=bjb.getPostExcerpt(post.excerpt, post.i81n)%></p>
			</div>
			<div class="uk-card-footer">
			  <p class="uk-button uk-button-text">Selengkapnya </p>
			</div>
		  </div>
		</a>
	</div>
	<%})%>
</div>
<%if(data._this.isPagination){%>
<div class="uk-margin" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-list-walker">

<%if(!_.isEmpty(data.posts)){%>
	<div class="uk-grid uk-grid-match" data-uk-grid data-uk-height-match="target: > div > a > .uk-card > .uk-card-body">
		<%_.each(data.posts, function(post){%>
		<%var meta = bjb.getMeta(post.metas, "custom","General")%>
		<div class="uk-width-3-4@m">
			<a <%=bjb.getAttr({
				class:[ 'uk-link-reset' ],
				href:[(meta.useRedirectLink === true ? meta.redirectLink : bjb.getPostUrl(post.postTypeSlug))],
				target:[meta.useRedirectLink === true && meta.newTab === true ? "_blank" : "_self"],

			})%>>
			<div class="uk-card uk-card-default uk-card-hover uk-card-small uk-grid-collapse" data-uk-grid>
				<%if(post.thumbnailImage !== null && post.thumbnailImage !== ""){%>
				<div class="uk-card-media-left uk-width-1-4 uk-background-cover" data-src="<%=bjb.getImageSrc(post.thumbnailImage)%>" uk-img="loading: eager">
				</div>
				<%} else if(post.featuredImage !== null && post.featuredImage !== "") {%>
					<div class="uk-card-media-left uk-width-1-4 uk-background-cover" data-src="<%=bjb.getImageSrc(post.featuredImage)%>" uk-img="loading: eager">
					</div>
				<%}%>
				<div class="uk-width-3-4">
					<div class="uk-card-body">
					<span class="uk-text-meta uk-margin-small-bottom">
						<%=post.typeDisplay%> 
					</span>
					<h4 class="uk-margin-remove-top"><%=bjb.getPostTitle(post.title, post.i81n)%></h4>
					<p class="uk-text-multiline-truncate"><%=bjb.getPostExcerpt(post.excerpt, post.i81n)%></p>
					<span class="uk-button uk-button-text">Selengkapnya </span>
					</div>
				</div>
			</div>
			</a>
		</div>
		<%})%>
	</div>
	<%if(data._this.isPagination){%>
	<div class="uk-margin-large-top" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>;position:left;"></div>
	<%}%>
<%} else {%>
	<div class="uk-flex-middle" data-uk-grid>
		<div class="uk-width-auto">
			<img src="../assets/img/not-found-icon.svg" width="120" height="120" uk-svg>
		</div>
		<div class="uk-width-expand">
			<h3 class="uk-margin-small-bottom">Pencarian tidak ditemukan...</h3>
			<p class="uk-text-muted">Ulangi pencarian dengan kata kunci lainnya.</p>
		</div>
	</div>
<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-slider-walker">
<div class="uk-position-relative" tabindex="-1" uk-slider>
    <ul class="uk-slider-items uk-grid-match uk-margin-bottom is-card-loop" data-uk-grid data-uk-height-match="target: > li > a > .uk-card > .uk-card-body">
        <%_.each(data.posts, function(post){%>
        <%var meta = bjb.getMeta(post.metas, "custom","General")%>
		<li class="<%=data._this.column%>">
			<a <%=bjb.getAttr({
                class:[ 'uk-link-reset' ],
                href:[(meta.useRedirectLink === true ? meta.redirectLink : bjb.getPostUrl(post.postTypeSlug))],
                target:[meta.useRedirectLink === true && meta.newTab === true ? "_blank" : "_self"],

            })%>>
                <div class="uk-card uk-card-default uk-card-small uk-card-hover">
                    <%if(post.thumbnailImage !== null && post.thumbnailImage !== ""){%>
                    <div class="uk-card-media-top">
                        <img data-src="<%=bjb.getImageSrc(post.thumbnailImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.thumbnailImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-transition-scale-down uk-transition-opaque" data-uk-img/>
                    </div>
                    <%} else if(post.featuredImage !== null && post.featuredImage !== "") {%>
                    <div class="uk-card-media-top">
                        <img data-src="<%=bjb.getImageSrc(post.featuredImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.featuredImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-transition-scale-down uk-transition-opaque" data-uk-img/>
                    </div>
                    <%}%>
                    <div class="uk-card-body">
                        <p class="uk-text-meta">
                            <%if(meta.useCustomPostDate === true){%>
                            <span data-uk-ef_date_label="date:<%=meta.postDate%>;format:DD/MM/YYYY"></span>
                            <%} else {%>
                            <span data-uk-ef_date_label="date:<%=post.createdDate%>;"></span>
                            <%}%>
                            <%if(!_.isEmpty(post.categories)){%>
                            <span data-uk-icon="icon: icon-separator; ratio: .7;" class="uk-icon">
                            </span>
                            <%}%>
                            <%=bjb.getCategory(post.categories)%> 
                        </p>
                        <h3 class="uk-card-title"><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
                    </div>
                    <div class="uk-card-footer">
                        <p class="uk-button uk-button-text">Selengkapnya </p>
                    </div>
                </div>
			</a>
		</li>
		<%})%>
    </ul>
    <a class="uk-position-center-left uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-next uk-slider-item="next"></a>
</div>
<%if(data._this.isPagination){%>
<div class="uk-margin" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-slider-walker-prestasi">
<div class="uk-position-relative" tabindex="-1" uk-slider>
    <ul class="uk-slider-items uk-grid-match uk-margin-bottom is-card-loop" data-uk-grid data-uk-height-match="target: > li > a > .uk-card > .uk-card-body">
        <%_.each(data.posts, function(post){%>
        <%var meta = bjb.getMeta(post.metas, "custom","General")%>
		<li class="<%=data._this.column%>" <%if(meta.showContent !== true){%>data-uk-lightbox="animation: fade"<%}%>>
			<%if(meta.showContent === true){%>
            <a <%=bjb.getAttr({
                class:[ 'uk-link-reset' ],
                href:"#",
                target:["_self"],
                "data-uk-ef_modal_post_button":"template-id:template-content-builder-render-modal-post;post-slug:"+post.postTypeSlug+";"
            })%>>
            <%} else {%>
            <a class="uk-inline uk-transition-toggle" href="<%=bjb.endpoints.FILE_CLIENT+"/"+post.featuredImage%>" data-caption="<%=post.title%>">
            <%}%>
                <div class="uk-card uk-card-default uk-card-small uk-card-hover">
                    <%if(post.thumbnailImage !== null && post.thumbnailImage !== ""){%>
                    <div class="uk-card-media-top">
                                <img data-src="<%=bjb.getImageSrc(post.thumbnailImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.thumbnailImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-transition-scale-down uk-transition-opaque" data-uk-img />
                    </div>
                    <%} else if(post.featuredImage !== null && post.featuredImage !== "") {%>
                    <div class="uk-card-media-top">
                                <img data-src="<%=bjb.getImageSrc(post.featuredImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.featuredImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-transition-scale-down uk-transition-opaque" data-uk-img/>
                    </div>
                    <%}%>
                    <div class="uk-card-body">
                        <p class="uk-text-meta">
                            <%if(meta.useCustomPostDate === true){%>
                            <span data-uk-ef_date_label="date:<%=meta.postDate%>;format:DD/MM/YYYY"></span>
                            <%} else {%>
                            <span data-uk-ef_date_label="date:<%=post.createdDate%>;"></span>
                            <%}%>
                            <span data-uk-icon="icon: icon-separator; ratio: .7;" class="uk-icon">
                            </span>Prestasi 
                        </p>
                        <h3 class="uk-card-title">bjb.getPostTitle(post.title, post.i81n)</h3>
                    </div>
                    <div class="uk-card-footer">
                        <p class="uk-button uk-button-text">Selengkapnya </p>
                    </div>
                </div>
			</a>
		</li>
		<%})%>
    </ul>
    <a class="uk-position-center-left uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-next uk-slider-item="next"></a>
</div>
<%if(data._this.isPagination){%>
<div class="uk-margin" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-slider-walker-asset">
    <div class="uk-position-relative" tabindex="-1" uk-slider>
        <ul class="uk-slider-items uk-grid-match uk-margin-bottom is-card-report" data-uk-grid data-uk-height-match="target: > li > a > .uk-card > .uk-card-body">
            <%_.each(data.posts, function(post){%>
            <%var meta = bjb.getMeta(post.metas, "custom","General")%>
            <li class="<%=data._this.column%>">
                <div class="uk-card uk-card-default uk-card-small uk-card-hover">
                    <a <%=bjb.getAttr({
	                    class:[ 'uk-link-reset' ],
	                    href:[bjb.endpoints.FILE_CLIENT+"/"+post.featuredImage],
	                    target:["_blank"],

                    })%>>
                        <div class="is-card-report-view" title="Lihat dokumen" data-uk-icon="icon: icon-extlink; ratio: .85;"></div>
	                    <div class="uk-card-body">
		                    <p class="uk-text-meta">PDF</p>
		                    <h3 class="uk-card-title"><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
	                    </div>
                    </a>
                    <div class="uk-card-footer">
                        <a href="<%=bjb.endpoints.FILE_CLIENT+" /"+post.featuredImage%>" target="_self" class="uk-button uk-button-text">Unduh Dokumen </a>
                    </div>
                </div>
            </li>
            <%})%>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>
    <%if(data._this.isPagination){%>
    <div class="uk-margin" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
    <%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-slider-walker-promo">
	<div class="uk-position-relative uk-padding-medium-top uk-slider-container-offset" tabindex="-1" uk-slider>
        <ul class="uk-slider-items uk-grid-match uk-margin-bottom" data-uk-grid data-uk-height-match="target: > li > a > .uk-card > .uk-card-body">
            <%_.each(data.posts, function(post){%>
			<%var meta = bjb.getMeta(post.metas, "custom","General")%>
            <li class="<%=data._this.column%>">
                <a <%=bjb.getAttr({
					class:[ 'uk-link-reset' ],
					href:[(meta.useRedirectLink === true ? meta.redirectLink : bjb.getPostUrl(post.postTypeSlug))],
					target:[meta.useRedirectLink === true && meta.newTab === true ? "_blank" : "_self"],

				})%>>
				<div class="uk-card uk-card-default uk-card-small uk-card-hover">
					<%if(post.thumbnailImage !== null && post.thumbnailImage !== ""){%>
					<div class="uk-card-media-top">
					  <img data-src="<%=bjb.getImageSrc(post.thumbnailImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.thumbnailImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-width-1-1" data-uk-img/>
					</div>
					<%} else if(post.featuredImage !== null && post.featuredImage !== "") {%>
					<div class="uk-card-media-top">
						<img data-src="<%=bjb.getImageSrc(post.featuredImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.featuredImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-width-1-1" data-uk-img/>
					</div>
					<%}%>
					<div class="is-card-overlay">
						<h3 class="uk-card-title uk-light"><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
						<p class="uk-margin-remove"><%=bjb.getPostExcerpt(post.excerpt, post.i81n)%></p>
						<p class="uk-button uk-button-text uk-margin-auto-top">Info Lebih Lanjut </p>
					</div>
					<div class="uk-card-body">
						<h3 class="uk-card-title"><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
					</div>
					<div class="uk-card-footer">
						<p class="uk-text-meta uk-text-small uk-margin-remove-top">
							<%if(meta.useStartDate === true){%>
							Periode&nbsp;<span data-uk-ef_date_label="date:<%=meta.startDate%>;format:DD/MM/YYYY"></span> 
							<span>&nbsp;-&nbsp;</span> 
							<%} else {%>
							Berlaku Hingga &nbsp; 
							<%}%>
							<span class="" data-uk-ef_date_label="date:<%=meta.endDate%>;format:DD/MM/YYYY">
						</p>
					</div>
				</div>
				</a>
            </li>
            <%})%>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>
    <%if(data._this.isPagination){%>
    <div class="uk-margin" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
    <%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-slider-walker-news">
    <div class="uk-position-relative uk-padding-medium-top -uk-margin-medium-top uk-slider-container-offset" tabindex="-1" uk-slider>
        <ul class="uk-slider-items uk-grid-match uk-margin-bottom is-card-loop" data-uk-grid data-uk-height-match="target: > li > a > .uk-card > .uk-card-body">
            <%_.each(data.posts, function(post){%>
			<%var meta = bjb.getMeta(post.metas, "custom","General")%>
            <li class="<%=data._this.column%>">
				<a 
				class="uk-link-reset" 
				href="<%=(meta.useRedirectLink === true ? meta.redirectLink : bjb.getPostUrl(post.postTypeSlug))%>" 
				target="<%=(meta.useRedirectLink === true && meta.newTab === true ? '_blank' : '_self')%>"
				>
				<div class="uk-card uk-card-default uk-card-small uk-card-hover">
					<%if(post.thumbnailImage !== null && post.thumbnailImage !== ""){%>
					<div class="uk-card-media-top">
						<img data-src="<%=bjb.getImageSrc(post.thumbnailImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.thumbnailImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-width-1-1" data-uk-img/>
					</div>
					<%} else if(post.featuredImage !== null && post.featuredImage !== "") {%>
					<div class="uk-card-media-top">
						<img data-src="<%=bjb.getImageSrc(post.featuredImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.featuredImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-width-1-1" data-uk-img/>
					</div>
					<%}%>
					<div class="uk-card-body">
						<p class="uk-text-meta">
							<%if(meta.useCustomPostDate === true){%>
							<span data-uk-ef_date_label="date:<%=meta.postDate%>;format:DD/MM/YYYY"></span>
							<%} else {%>
							<span data-uk-ef_date_label="date:<%=post.createdDate%>;"></span>
							<%}%>
							<span data-uk-icon="icon: icon-separator; ratio: .7;" class="uk-icon">
							</span>
							<%=bjb.getCategory(post.categories, "Berita")%>
						</p>
						<h3 class="uk-card-title"><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
					</div>
					<div class="uk-card-footer">
						<p class="uk-button uk-button-text">Selengkapnya </p>
					</div>
				</div>
				</a>
            </li>
            <%})%>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>
    <%if(data._this.isPagination){%>
    <div class="uk-margin" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
    <%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-slider-walker-pengumuman">
    <div class="uk-position-relative" tabindex="-1" uk-slider>
        <ul class="uk-slider-items uk-grid-match uk-margin-bottom is-card-loop" data-uk-grid data-uk-height-match="target: > li > a > .uk-card > .uk-card-body">
            <%_.each(data.posts, function(post){%>
			<%var meta = bjb.getMeta(post.metas, "custom","General")%>
            <li class="<%=data._this.column%>">
                <a <%=bjb.getAttr({
					class:[ 'uk-link-reset' ],
					href:[(meta.useRedirectLink === true ? meta.redirectLink : bjb.getPostUrl(post.postTypeSlug))],
					target:[meta.useRedirectLink === true && meta.newTab === true ? "_blank" : "_self"],

				})%>>
				<div class="uk-card uk-card-default uk-card-small uk-card-hover">
					<div class="uk-card-body">
						<p class="uk-text-meta">
							<%if(meta.useCustomPostDate === true){%>
							<span data-uk-ef_date_label="date:<%=meta.postDate%>;format:DD/MM/YYYY"></span>
							<%} else {%>
							<span data-uk-ef_date_label="date:<%=post.createdDate%>;"></span>
							<%}%>
							<%if(!_.isEmpty(post.categories)){%>
							<span data-uk-icon="icon: icon-separator; ratio: .7;" class="uk-icon">
							</span>
							<%}%>
							<%=bjb.getCategory(post.categories)%>
						</p>
						<h3 class="uk-card-title"><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
						<p><%=bjb.getPostExcerpt(post.excerpt, post.i81n)%></p>
					</div>
					<div class="uk-card-footer">
						<p class="uk-button uk-button-text">Selengkapnya </p>
					</div>
				</div>
				</a>
            </li>
            <%})%>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>
    <%if(data._this.isPagination){%>
    <div class="uk-margin" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
    <%}%>
</script>
    <script type="text/template" id="template-content-builder-render-posts-slider-walker-gallery">
    <div class="uk-position-relative" tabindex="-1" uk-slider>
        <ul class="uk-slider-items uk-grid-match uk-margin-bottom is-card-loop" data-uk-grid data-uk-height-match="target: > li > a > .uk-card > .uk-card-body">
            <%_.each(data.posts, function(post){%>
			<%var meta = bjb.getMeta(post.metas, "custom","General")%>
            <li class="<%=data._this.column%>">
                <a <%=bjb.getAttr({
					class:[ 'uk-link-reset' ],
					href:[(meta.useRedirectLink === true ? meta.redirectLink : bjb.getPostUrl(post.postTypeSlug))],
					target:[meta.useRedirectLink === true && meta.newTab === true ? "_blank" : "_self"],

				})%>>
				<div class="uk-card uk-card-default uk-card-small uk-card-hover">
					<%if(post.thumbnailImage !== null && post.thumbnailImage !== ""){%>
					<div class="uk-card-media-top">
					  <img data-src="<%=bjb.getImageSrc(post.thumbnailImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.thumbnailImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-width-1-1" data-uk-img/>
					</div>
					<%} else if(post.featuredImage !== null && post.featuredImage !== "") {%>
					<div class="uk-card-media-top">
						<img data-src="<%=bjb.getImageSrc(post.featuredImage)%>" alt="<%=bjb.getFilenameWithoutExtension(bjb.getImageSrc(post.featuredImage))%>" title="<%=bjb.getPostTitle(post.title, post.i81n)%>" class="uk-width-1-1" data-uk-img/>
					</div>
					<%}%>
					<div class="uk-card-body">
						<p class="uk-text-meta">
							<%if(meta.useCustomPostDate === true){%>
							<span data-uk-ef_date_label="date:<%=meta.postDate%>;format:DD/MM/YYYY"></span>
							<%} else {%>
							<span data-uk-ef_date_label="date:<%=post.createdDate%>;"></span>
							<%}%>
							<span data-uk-icon="icon: icon-separator; ratio: .7;" class="uk-icon">
					</span>
					<%=bjb.getCategory(post.categories, "Galeri")%>
						</p>
						<h3 class="uk-card-title"><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
					</div>
					<div class="uk-card-footer">
						<p class="uk-button uk-button-text">Selengkapnya </p>
					</div>
				</div>
				</a>
            </li>
            <%})%>
        </ul>
        <a class="uk-position-center-left uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-slidenav-tertiary" href="#" uk-slidenav-next uk-slider-item="next"></a>
    </div>
    <%if(data._this.isPagination){%>
    <div class="uk-margin" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
    <%}%>
</script>
    <script type="text/template" id="template-content-builder-render-menu-walker">
    <%
        var navAttr = {
		class:[
			"ef-nav"
		],
		'data-depth':[data.depth]
    };
    if(data.depth > 0 && data.depth !== 2 ){
		navAttr.class.push(
			!data.isMegamenu ? "uk-nav uk-navbar-dropdown-nav" :"uk-nav uk-nav-default"
		);
    }
	if(data.depth === 2 && data.isMegamenu ){
		if(data.megamenuMode !== "megamenu-grid"){
			navAttr["data-uk-ef_megamenu_tab"] = "parent:"+data.parent+";";
			navAttr["data-uk-grid"] = "";
			navAttr.class.push(
				"uk-hidden uk-child-width-1-3"
			);
		}else{

		}

    }
	if(data.depth > 2 && data.isMegamenu ){
		if(data.megamenuMode !== "megamenu-grid"){
			navAttr.class.push(
				"is-meganav-heightlarge"
			);
		}else{

		}

    }
	if(data.depth === 1 && data.isMegamenu ){
		if(data.megamenuMode !== "megamenu-grid"){
			navAttr["data-uk-tab"] = "parent:"+data.parent+";";
		}else{

		}
    }
    if(data.depth < 1 ){
		navAttr.class.push(
			"uk-navbar-nav"
		);
    }
    if(data.depth > 2 ){
		navAttr.class.push(
			!data.isMegamenu ? "uk-nav uk-navbar-dropdown-nav" :""
		);
    }
    %>
	<%if((data.depth == 1 || data.depth == 2  || data.depth == 3 ) && data.isMegamenu && data.megamenuMode == "megamenu-grid"){%>

    <%} else if(data.depth !== 2 || (data.depth === 2 && !data.isMegamenu) ){%>
		<ul <%=bjb.getAttr(navAttr)%>>
	<%} else {%>
		<div <%=bjb.getAttr(navAttr)%>>
	<%}%>
		<%_.each(data.menus, function(menu){
			var metas = bjb.parseMetas(!_.isUndefined(menu.metas) ? menu.metas : []);
			var isMegamenu = data.isMegamenu || false;
			var megamenuMode = data.megamenuMode || "";
			var useScroll = false;
			var icon = "";
			var setAsColumn = false;
			var setAsGrid = false;
			var columnWidth = "uk-width-1-1";
			var excerpt = "";
			var backgroundColor = "";
			var backgroundImage = "";
			var linkStyle = "";
			var block = "";
			var trigger = "";
			if(data.depth === 0 && !_.isUndefined(metas.layout) && !_.isUndefined(metas.layout.General) && !_.isUndefined(metas.layout.General.mode)){
				isMegamenu = metas.layout.General.mode === "megamenu" || metas.layout.General.mode === "megamenu-grid";
			}
			if(data.depth === 0 && !_.isUndefined(metas.layout) && !_.isUndefined(metas.layout.General) && !_.isUndefined(metas.layout.General.mode)){
				megamenuMode = metas.layout.General.mode;
			}
			if(!_.isUndefined(metas.layout) && !_.isUndefined(metas.layout.General) && !_.isUndefined(metas.layout.General.useScroll)){
				useScroll = metas.layout.General.useScroll === true;
			}
			if(!_.isUndefined(metas.layout) && !_.isUndefined(metas.layout.General) && !_.isUndefined(metas.layout.General.icon)){
				icon = metas.layout.General.icon;
			}
			if(!_.isUndefined(metas.layout) && !_.isUndefined(metas.layout.General) && !_.isUndefined(metas.layout.General.setAsColumn)){
				setAsColumn = metas.layout.General.setAsColumn;
			}
			if(!_.isUndefined(metas.layout) && !_.isUndefined(metas.layout.General) && !_.isUndefined(metas.layout.General.setAsGrid)){
				setAsGrid = metas.layout.General.setAsGrid;
			}
			if(!_.isUndefined(metas.layout) && !_.isUndefined(metas.layout.General) && !_.isUndefined(metas.layout.General.columnWidth)){
				columnWidth = metas.layout.General.columnWidth;
			}
			if(!_.isUndefined(metas.layout) && !_.isUndefined(metas.layout.General) && !_.isUndefined(metas.layout.General.excerpt)){
				excerpt = metas.layout.General.excerpt;
			}
			if(!_.isUndefined(metas.layout) && !_.isUndefined(metas.layout.General) && !_.isUndefined(metas.layout.General.backgroundColor)){
				backgroundColor = metas.layout.General.backgroundColor;
			}
			if(!_.isUndefined(metas.layout) && !_.isUndefined(metas.layout.General) && !_.isUndefined(metas.layout.General.backgroundImage)){
				backgroundImage = metas.layout.General.backgroundImage;
			}
			if(!_.isUndefined(metas.layout) && !_.isUndefined(metas.layout.General) && !_.isUndefined(metas.layout.General.linkStyle)){
				linkStyle = metas.layout.General.linkStyle;
			}
			if(!_.isUndefined(metas.layout) && !_.isUndefined(metas.layout.General) && !_.isUndefined(metas.layout.General.block)){
				block = metas.layout.General.block;
			}
			if(!_.isUndefined(metas.layout) && !_.isUndefined(metas.layout.General) && !_.isUndefined(metas.layout.General.trigger)){
				trigger = _.isEmpty(metas.layout.General.trigger) ? "hover" : metas.layout.General.trigger;
			} else {
				trigger = "hover";
			}
		%>
			<%
			var listAttr = {
				class:[
					data.depth > 0 && menu.childrens.length > 0 ? "uk-parent" : "",
					isMegamenu ? "is-meganav":"",
					"menu-level-" + data.depth
				]
			};
			%>
			<%if(data.depth > 0 && isMegamenu && megamenuMode == "megamenu-grid" && setAsColumn){%>
				<div class="<%=columnWidth%>">
			<%} else if(data.depth === 2 && data.isMegamenu){%>
				<div>
			<%}else{%>
				<li <%=bjb.getAttr(listAttr)%>>
			<%}%>
				<%if(setAsColumn || setAsGrid){%>
				<%} else if(data.isMegamenu && excerpt != ""){%>
					<a href="<%=bjb.getPostUrl(menu.url)%>" <%if(useScroll){%>data-uk-scroll<%}%>>
						<%if(backgroundImage !== ""){%>
							<div>
								<div class="uk-inline uk-overflow-hidden ef-megamenu-card-image" style="border-radius:4px;">
									<img data-src="<%=bjb.getImageSrc(backgroundImage)%>" width="352" height="100" alt="" data-uk-img>
									<div class="uk-overlay-primary uk-position-cover"></div>
									<div class="uk-position-bottom-left uk-light uk-position-small">
										<span class="uk-h5">
											<%if(icon !== "" ){%>
												<span data-uk-icon="icon:<%=icon%>"></span>
											<%}%>
											<%=bjb.getMenuTitle(menu.title, menu.i81n)%>
										</span>
									</div>
								</div>
							</div>
						<%} else {%>
							<div 
								class="uk-width-1-1 uk-card uk-card-hover uk-card-body uk-card-small ef-megamenu-card" 
								style="
								<%if(backgroundImage !== ""){%>
									background-image:url(<%=bjb.endpoints.FILE_CLIENT%>/<%=backgroundImage%>);
								<%}%>
								<%if(backgroundColor !== ""){%>
									background-color:<%=backgroundColor%>;
								<%}%>"
							>
								<h5>
									<%if(icon !== "" ){%>
										<span data-uk-icon="icon:<%=icon%>"></span>
									<%}%>
									<%=bjb.getMenuTitle(menu.title, menu.i81n)%>
								</h5>
								<%if(excerpt != " "){%>
									<p><%=excerpt%></p>
								<%}%>
							</div>
						<%}%>
					</a>
				<%} else if(data.depth === 2 && data.isMegamenu){%>
					<h4>
						<a href="<%=bjb.getPostUrl(menu.url)%>" <%if(useScroll){%>data-uk-scroll<%}%>>
							<%if(icon !== "" ){%>
								<span data-uk-icon="icon:<%=icon%>"></span>
							<%}%>
							<%=bjb.getMenuTitle(menu.title, menu.i81n)%>
						</a>
					</h4>
				<%} else {%>
					<a href="<%=bjb.getPostUrl(menu.url)%>" <%if(useScroll){%>data-uk-scroll<%}%>>
						<%if(icon !== "" ){%>
							<span data-uk-icon="icon:<%=icon%>"></span>
						<%}%>
						<%=bjb.getMenuTitle(menu.title, menu.i81n)%>
					</a>
				<%}%>
				<%if(data.depth > 1 && isMegamenu && megamenuMode == "megamenu-grid" && !_.isEmpty(block)){%>
					<div data-uk-ef_blog_post="post-type-slug:<%=_.escape(block.split("|")[0])%>;post-type:Block;"></div>
				<%} else if(menu.childrens.length > 0){%>
					<%if(data.depth === 0 && isMegamenu){%>
						<%if(megamenuMode !== "megamenu-grid"){%>
							<div class="uk-card uk-card-body uk-card-default uk-margin-remove" uk-drop="boundary-x: !.uk-navbar; pos: bottom-justify;offset:1;stretch: x;delay-hide:50;mode:<%=trigger%>;">
								<div class="uk-container">
									<div class="uk-width-1-1 ef-megamenu-container">
						<%}else{%>
							<div class="uk-card uk-card-body uk-card-small uk-card-default uk-margin-remove" uk-drop="boundary-x: !.uk-navbar; pos: bottom-justify;offset:1;stretch: x;delay-hide:50;mode:<%=trigger%>;">
								<div class="uk-container">
									<div class="uk-width-1-1 ef-megamenu-container ef-megamenu-grid uk-grid-small" data-uk-grid>
						<%}%>
					<%}else{%>
						<%if(!data.isMegamenu){%>
							<div class="uk-card uk-card-body uk-card-default" data-uk-drop="cls-drop: uk-navbar-dropdown; boundary: .is-headermain.uk-sticky; pos: bottom-left; flip: x;offset:1;delay-hide:50;">
						<%}%>
					<%}%>
					<%if(data.depth > 0 && isMegamenu && megamenuMode == "megamenu-grid" && !_.isEmpty(block)){%>
						<div data-uk-ef_blog_post="post-type-slug:<%=_.escape(block.split("|")[0])%>;post-type:Block;"></div>
					<%} else if(data.depth > 0 && isMegamenu && megamenuMode == "megamenu-grid" && setAsColumn){%>
						<div class="<%columnWidth%>">
							<%=data._this.renderMenu(menu.childrens, (data.depth + 1), data.depth === 0 ? isMegamenu : data.isMegamenu, menu.id, megamenuMode)%>
						</div>
					<%} else if(data.depth > 0 && isMegamenu && megamenuMode == "megamenu-grid" && setAsGrid){%>
						<div data-uk-grid>
							<%=data._this.renderMenu(menu.childrens, (data.depth + 1), data.depth === 0 ? isMegamenu : data.isMegamenu, menu.id, megamenuMode)%>
						</div>
					<%} else {%>
						<%=data._this.renderMenu(menu.childrens, (data.depth + 1), data.depth === 0 ? isMegamenu : data.isMegamenu, menu.id, megamenuMode)%>
					<%}%>
					<%if(data.depth === 0 && isMegamenu){%>
						<%if(megamenuMode !== "megamenu-grid"){%>
								<div class="uk-switcher ef-megamenu-tab-items uk-margin"></div>
								</div>
							</div>
						</div>
						<%}else{%>
								</div>
							</div>
						</div>
						<%}%>
					<%}else{%>
						<%if(!data.isMegamenu){%>
						</div>
						<%}%>
					<%}%>
				<%} else if(menu.childrens.length === 0 && data.depth === 1 && data.isMegamenu){%>
					<%if(megamenuMode !== "megamenu-grid"){%>
						<div class="uk-hidden uk-child-width-1-3" data-uk-grid data-uk-ef_megamenu_tab></div>
					<%}else{%>

					<%}%>

				<%}%>
			<%if(data.depth > 0 && isMegamenu && megamenuMode == "megamenu-grid" && setAsColumn){%>
				</div>
			<%} else if(data.depth === 2 && data.isMegamenu){%>
				</div>
			<%}else{%>
				</li>
			<%}%>
		<%})%>
	<%if((data.depth == 1 || data.depth == 2 || data.depth == 3  ) && data.isMegamenu && data.megamenuMode == "megamenu-grid"){%>

	<%} else if(data.depth !== 2 || (data.depth === 2 && !data.isMegamenu) ){%>
		</ul>
	<%} else {%>
		</div>
	<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-menu-vertical-walker">
<%
var navAttr = {
	class:[
		"ef-nav"
	],
	'data-depth':[data.depth]
};
if(data.depth == 0){
	navAttr.class.push(
		"uk-nav uk-nav-default uk-nav-divider uk-nav-parent-icon uk-nav-accordion"
	);
	navAttr["data-uk-nav"] = [
		"targets: >.is-mobile-haschildren"
	];
}
if(data.depth > 0 ){
	navAttr.class.push(
		"uk-nav-sub"
	);
	navAttr["data-uk-nav"] = [
		"targets: >.is-mobile-haschildren"
	];
}
%>
	<ul <%=bjb.getAttr(navAttr)%>>
		<%_.each(data.menus, function(menu){%>
			<%
			var listAttr = {
				class:[
					menu.childrens.length > 0 ? "is-mobile-haschildren uk-parent" : ""
				]
			};
			if(data.depth > 0 ){
				navAttr.class.push(
					"is-mobile-hasgrandchild"
				);
			}
			var metas = bjb.parseMetas(!_.isUndefined(menu.metas) ? menu.metas : []);
			var enableHeading = false;
			if(data.depth === 1 && !_.isUndefined(metas.layout) && !_.isUndefined(metas.layout.General) && !_.isUndefined(metas.layout.General.megamenu)){
				enableHeading = metas.layout.General.megamenu;
			}
			%>
			<li <%=bjb.getAttr(listAttr)%>>
				<%if(!enableHeading){%>
				<a href="<%=bjb.getPostUrl(menu.url)%>">
				<%}%>
				<%if(enableHeading){%>
				<hr/>
				<span class="uk-text-small uk-text-primary"><%=bjb.getMenuTitle(menu.title, menu.i81n)%></span>
				<%} else {%>
					<%=bjb.getMenuTitle(menu.title, menu.i81n)%>
					<%if(menu.childrens.length > 0){%>
						<span uk-nav-parent-icon></span>
					<%}%>
				<%}%>
				<%if(!enableHeading){%>
				</a>
				<%}%>
				<%if(menu.childrens.length > 0){%>
					<%=data._this.renderMenu(menu.childrens, (data.depth + 1))%>
				<%}%>
			</li>
		<%})%>
	</ul>
</script>
    <script type="text/template" id="template-content-builder-render-menu-composite">
    <%
    if(data.depth>0)return;
    %>
    <option disabled selected>Pekerjaan</option>
    <%_.each(data.menus, function(menu){%>
        <option value="<%=menu.id%>" data-childrens="<%=_.escape(
            JSON.stringify(
                _.map(menu.childrens, function(children){
                    return {
                        title:children.title,
                        url:children.url
                    };
                })
            ))%>">
            <%=bjb.getMenuTitle(menu.title, menu.i81n)%>
        </option>
    <%});%>
</script>
    <script type="text/template" id="template-content-builder-render-breadcrumbs">
    <!-- Breadcrumbs -->
    <section class="uk-section uk-section-small uk-padding-remove-bottom">
        <div class="uk-container uk-flex uk-flex-right@m">
            <ul itemscope itemtype="https://schema.org/BreadcrumbList" class="uk-breadcrumb">
                <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                    <a itemprop="item" href="<%=bjb.baseURI%>">Beranda</a>
                </li>
                <%_.each(data, function(parent){%>
                    <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="<%=bjb.getPostUrl(parent.postTypeSlug)%>">
                            <%=parent.title%>
                        </a>
                    </li>
                    <%})%>
            </ul>
        </div>
    </section>
    </script>
    <script type="text/template" id="template-content-builder-render-search-result">
    <%
    var postTypeMap = {
        Post: "Artikel",
        News: "Berita",
        Page: "Produk dan Layanan",
        Promo: "Promo",
        Gallery: "Galeri",
        Prestasi: "Prestasi",
        Asset: "File",
        Pengumuman: "Pengumuman"
    };
    var searchCategories = !_.isUndefined(data._this.$blog.options.layout) && !_.isUndefined(data._this.$blog.options.layout.General) && (!_.isUndefined(data._this.$blog.options.layout.General.searchCategory) && _.isArray(data._this.$blog.options.layout.General.searchCategory)) ? data._this.$blog.options.layout.General.searchCategory : [];
    %>
    <!-- Tab Mobile Version -->
    <aside class="uk-section uk-section-small is-subpage-nav-mobile is-search-nav uk-padding-remove-top uk-hidden@s">
        <div class="uk-container">
            <ul class="uk-flex-left" data-uk-tab>
                <li class="uk-active">
                    <a href="#" aria-expanded="false">
                        <span>Semua <span class="uk-label">456</span></span> <span data-uk-icon="icon: icon-d-arrow-down; ratio: .85" class="uk-icon"></span>
                    </a>
                    <div data-uk-drop="mode: click; boundary: !.uk-container; stretch: x; flip: false" class="uk-navbar-dropdown">
                        <ul class="uk-nav uk-dropdown-nav ef-blog-search-category-action" data-uk-switcher="connect:.search-results,.xxx">
                            <li>
                                <a href="#">Semua<span class="uk-label"></span></a>
                            </li>
                            <%_.each(searchCategories, function(searchCategory){%>
                            <li>
                                <a href="#" data-post-type="<%=searchCategory.postType%>" data-category="<%=searchCategory.category%>" data-tag="<%=searchCategory.tag%>" ><%=searchCategory.label%><span class="uk-label"></span></a>
                            </li>
                            <%})%>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </aside>
    <!-- Tab Desktop Version -->
    <aside class="uk-section uk-section-small is-subpage-nav is-search-nav uk-visible@s uk-padding-remove-top">
        <div class="uk-container">
            <ul class="uk-flex-left@s ef-blog-search-category-action xxx" data-uk-tab="connect:.search-results">
                <li>
                    <a href="#">Semua<span class="uk-label"></span></a>
                </li>
                <%_.each(searchCategories, function(searchCategory){%>
                <li>
                    <a href="#" data-post-type="<%=searchCategory.postType%>" data-category="<%=searchCategory.category%>" data-tag="<%=searchCategory.tag%>" ><%=searchCategory.label%><span class="uk-label"></span></a>
                </li>
                <%})%>
            </ul>
        </div>
    </aside>
    <!-- Search Loop "All Tab" Berita / Produk / Galeri / Pengumuman / Lainnya-->
    <section class="uk-section uk-section-small">
        <div class="uk-container">
            <ul class="uk-switcher uk-margin search-results">
                <li>
                    <div class="ef-blog-search-category-container" data-post-type="all" data-category="all" data-tag="all">
                        <%if(data.info.totalPage > 0){%>
                        <div class="uk-margin-medium-bottom">
                            <h1 class="uk-h3 uk-margin-remove-bottom"> Hasil Pencarian &quot;<%=data._this.keyword%>&quot; </h1>
                            <p class="uk-text-meta">Menampilkan sekitar <%=data.info.totalPage%> hasil</p>
                        </div>
                        <%}%>
                        <%=data.results%>
                    </div>
                </li>
                <%_.each(searchCategories, function(searchCategory){%>
                <li>
                    <div class="ef-blog-search-category-container" data-post-type="<%=searchCategory.postType%>" data-category="<%=searchCategory.category%>" data-tag="<%=searchCategory.tag%>" uk-height-viewport="min-height: 200">
                    </div>
                </li>
                <%})%>
            </ul>
        </div>
    </section>

</script>
    <script type="text/template" id="template-content-builder-render-currency-walker">
<div class="uk-text-center uk-margin-medium-bottom">
  <div class="uk-flex-inline@s uk-flex-middle is-currency-inline">
    <h2 class="uk-margin-remove">Kurs TT Special</h2>
    <p class="uk-margin-remove uk-margin-medium-left">
      Terakhir diperbarui pada 
      <span data-uk-ef_date_label="date:<%=data._this.specialLastUpdatedDate%>;format:DD/MM/YYYY"></span>
      <span><%=data._this.specialLastUpdatedTime%></span> WIB
    </p>
  </div>
</div>
<div class="uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-expand@l uk-grid uk-grid-small is-currency-card" data-uk-grid data-uk-height-match="target: .uk-card-body">
	<%_.each(data.posts, function(post){%>
    <%if(post.code != "IDR"){%>
		<div class="uk-first-column">
        <div class="uk-card uk-card-default uk-card-small uk-card-hover">
          <div class="uk-card-body">
            <div class="is-currency-country">
              <h4 class="uk-card-title notranslate"><%=post.code%></h4>
              <img data-src="<%=bjb.getImageSrc(post.featuredImage)%>" width="24" height="24" alt="USD" data-uk-img/>
            </div>
            <div class="is-currency-buy">
              <p>Beli</p>
              <h2 data-uk-ef_currency_label="value:<%=post.specialBuy%>;"></h2>
            </div>
            <hr />
            <div class="is-currency-sell">
              <p>Jual</p>
              <h2 data-uk-ef_currency_label="value:<%=post.specialSell%>;"></h2>
            </div>
          </div>
        </div>
      </div>
    <%}%>
	<%})%>
</div>

<div class="uk-margin-medium-top uk-text-center">
<a class="uk-button uk-button-default uk-visible@m" href="page/daftar-kurs">Lihat Info Kurs &amp; Kalkulator</a>
</div>
</script>
    <script type="text/template" id="template-content-builder-render-currency-calculator">
<div data-uk-grid>
  <div class="uk-width-2-3@m">
    <table class="uk-table">
      <thead>
        <tr style="background-color:#2fa0de; color:#ffffff !important;">
            <th style="font-weight: bold; vertical-align:middle;" rowspan="2" class="text-center">
                <span id="ContentPlaceHolder1_lblKursValuta" style="color:#ffffff !important;">Mata Uang</span>
            </th>
            <th style="font-weight: bold;" colspan="2" class="text-center">
                <div class="uk-width-1-1">TT Special	</div>
                <label class="uk-width-auto" data-uk-ef_date_label="date:<%=data._this.specialLastUpdatedDate%>;format:DD/MM/YYYY"></label>
                <label><%=data._this.specialLastUpdatedTime%></label>
            </th>
            <th style="font-weight: bold;" colspan="2" class="text-center">
                <div class="uk-width-1-1" class="d-block">TT Counter</div>
                <label class="uk-width-auto" data-uk-ef_date_label="date:<%=data._this.counterLastUpdatedDate%>;format:DD/MM/YYYY"></label>
                <label><%=data._this.counterLastUpdatedTime%></label>
            </th>
            <th style="font-weight: bold;" colspan="2" class="text-center">
                <div class="uk-width-1-1" class="d-block">Bank Notes</div>
                <label class="uk-width-auto" data-uk-ef_date_label="date:<%=data._this.bankNotesLastUpdatedDate%>;format:DD/MM/YYYY"></label>
                <label><%=data._this.bankNotesLastUpdatedTime%></label>
            </th>
        </tr>
        <tr style="background-color:#eec92c;">
            <th style="font-weight: bold;background-color:#2BA7DF;" class="text-center">
                <span id="ContentPlaceHolder1_lblKursBeli">Beli</span>
            </th>
            <th style="font-weight: bold;background-color:#1C84B4;" class="text-center">
                <span id="ContentPlaceHolder1_lblKursJual">Jual</span>
            </th>
            <th style="font-weight: bold;background-color:#2BA7DF;" class="text-center">
                <span id="ContentPlaceHolder1_Label2">Beli</span>
            </th>
            <th style="font-weight: bold;background-color:#1C84B4;" class="text-center">
                <span id="ContentPlaceHolder1_Label3">Jual</span>
            </th>
            <th style="font-weight: bold;background-color:#2BA7DF;" class="text-center">
                <span id="ContentPlaceHolder1_Label5">Beli</span>
            </th>
            <th style="font-weight: bold;background-color:#1C84B4;" class="text-center">
                <span id="ContentPlaceHolder1_Label6">Jual</span>
            </th>
        </tr>
      </thead>
    
    <%_.each(data.posts, function(post){%>
        <%if(post.code != "IDR"){%>
          <tr>
            <td><%=post.code%></td>
            <td data-uk-ef_currency_label="value:<%=post.specialBuy%>;"></td>
            <td data-uk-ef_currency_label="value:<%=post.specialSell%>;"></td>
            <td data-uk-ef_currency_label="value:<%=post.counterBuy%>;"></td>
            <td data-uk-ef_currency_label="value:<%=post.counterSell%>;"></td>
            <td data-uk-ef_currency_label="value:<%=post.bankNotesBuy%>;"></td>
            <td data-uk-ef_currency_label="value:<%=post.bankNotesSell%>;"></td>
          </tr>
        <%}%>
      <%})%>
    </table>
  </div>
  <div class="uk-width-1-3@m">
    <div class="cnt-calc cnt-calc uk-card uk-card-default uk-card-hover uk-card-body">
      <div class="form-inline row">
          <div class="uk-width-1-1 dropbox uk-margin-small-bottom kurs-box p-0">
              <span style="font-weight: bolder;">Pilihan Jenis </span>
          </div>
          <div class="form-group col-lg-8 col-sm-12 dropbox uk-margin-small-bottom kurs-box p-0">
              <i class="down-arrow-calc" style="left:72%;"></i>
              <select data-uk-ef_select name="ctl00$ContentPlaceHolder1$cmbSelectJenis" id="ContentPlaceHolder1_cmbSelectJenis" class="uk-select cmbJenis" style="margin-left:0px;">
                <option value="beli">Beli</option>
                <option value="jual">Jual</option>
              </select>
          </div>
      </div>
      <div data-uk-grid>
          <div class="uk-width-auto dropbox uk-margin-small-bottom kurs-box p-0">
              <i class="down-arrow-calc" style="left:65px;"></i>
              <select data-uk-ef_select name="ctl00$ContentPlaceHolder1$cmbKalkulator1" id="ContentPlaceHolder1_cmbKalkulator1" class="uk-select calc-control calc1" style="margin-left:0px;">
                <%_.each(data.posts, function(post){%>
                  <option value="<%=post.code%>" data-beli="<%=post.specialBuy%>" data-jual="<%=post.specialSell%>"><%=post.code%></option>
                <%})%>
              </select>
          </div>
          <div class="uk-width-expand dropbox dropbox-nominal uk-margin-small-bottom uk-padding-remove uk-margin-small-left">
              <input name="ctl00$ContentPlaceHolder1$txtNominalKurs" type="text" id="ContentPlaceHolder1_txtNominalKurs" placeholder="Masukan Nominal" pattern="[0-9]*" class="uk-input form-control-input-calc txtNominal1 numberOnly"  style="margin-left:0px; width:100%;"  inputmode="numeric">
          </div>
      </div>
      <div data-uk-grid class="uk-margin-remove-top">
          <div class="uk-width-auto dropbox uk-margin-small-bottom kurs-box p-0">
              <i class="down-arrow-calc" style="left:65px;"></i>
              <select data-uk-ef_select name="ctl00$ContentPlaceHolder1$cmbKalkulator2" id="ContentPlaceHolder1_cmbKalkulator2" class="uk-select calc-control calc2" style="margin-left:0px;">
                <%_.each(data.posts, function(post){%>
                  <option value="<%=post.code%>" data-beli="<%=post.specialBuy%>" data-jual="<%=post.specialSell%>"><%=post.code%></option>
                <%})%>
              </select>
          </div>
          <div class="uk-width-expand dropbox dropbox-nominal uk-padding-remove uk-margin-small-left">
              <input type="text" class="uk-input form-control-input-calc txtNominal2" style="margin-left:0px; width:100%;" id="" placeholder="" readonly="">
          </div>
      </div>
      <hr/>
      <p><strong>Catatan :</strong></p>
      <ul class="uk-text-small">
        <li>Kurs indicative dapat berubah sewaktu-waktu. Nego harga atau Update dapat Contact Sales Atau Call <strong>021 - 2512502</strong></li>
        <li>Indikasi harga tersebut hanya untuk Volume lebih besar dari USD 100.000 atau mata uang lainnya yang Equivalen</li>
      </ul>
    </div>
  </div>
</div>
</script>
    <div class="uk-modal-container uk-modal" id="modal-custom" uk-ef_modal_content="" data-uk-modal="">
        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical uk-overflow-auto" data-uk-overflow-auto=""
            role="dialog" aria-modal="true">
            <button title="close popup modal" class="uk-modal-close-default uk-icon uk-close" type="button"
                data-uk-close="" aria-label="Close"></button>
            <div class="modal-custom-content"></div>
        </div>
    </div>
    <script type="text/template" id="template-content-builder-render-posts-calendar-walker">
<div class="uk-grid uk-grid-match is-card-loop" data-uk-grid data-uk-height-match="target: > div > a > .uk-card > .uk-card-body">
	<div uk-filter="target: .js-filter" class="uk-width-1-1">

    <ul class="uk-width-1-1 uk-subnav uk-flex uk-flex-center uk-flex-middle">
		<li class="prev-month"><a href="" class="uk-icon-button uk-margin-small-right" uk-icon="icon-d-arrow-left"></a></li>
        <li uk-filter-control=".tag-month-0" class="<%=data._this.currentMonth == 0 ? "uk-active": "uk-hidden"%>" data-index="0"><a href="#"><h3 class="uk-margin-remove-bottom">Januari <%=data._this.year%></h3></a></li>
        <li uk-filter-control=".tag-month-1" class="<%=data._this.currentMonth == 1 ? "uk-active": "uk-hidden"%>" data-index="1"><a href="#"><h3 class="uk-margin-remove-bottom">Februari <%=data._this.year%></h3></a></li>
        <li uk-filter-control=".tag-month-2" class="<%=data._this.currentMonth == 2 ? "uk-active": "uk-hidden"%>" data-index="2"><a href="#"><h3 class="uk-margin-remove-bottom">Maret <%=data._this.year%></h3></a></li>
        <li uk-filter-control=".tag-month-3" class="<%=data._this.currentMonth == 3 ? "uk-active": "uk-hidden"%>" data-index="3"><a href="#"><h3 class="uk-margin-remove-bottom">April <%=data._this.year%></h3></a></li>
        <li uk-filter-control=".tag-month-4" class="<%=data._this.currentMonth == 4 ? "uk-active": "uk-hidden"%>" data-index="4"><a href="#"><h3 class="uk-margin-remove-bottom">Mei <%=data._this.year%></h3></a></li>
        <li uk-filter-control=".tag-month-5" class="<%=data._this.currentMonth == 5 ? "uk-active": "uk-hidden"%>" data-index="5"><a href="#"><h3 class="uk-margin-remove-bottom">Juni <%=data._this.year%></h3></a></li>
        <li uk-filter-control=".tag-month-6" class="<%=data._this.currentMonth == 6 ? "uk-active": "uk-hidden"%>" data-index="6"><a href="#"><h3 class="uk-margin-remove-bottom">Juli <%=data._this.year%></h3></a></li>
        <li uk-filter-control=".tag-month-7" class="<%=data._this.currentMonth == 7 ? "uk-active": "uk-hidden"%>" data-index="7"><a href="#"><h3 class="uk-margin-remove-bottom">Agustus <%=data._this.year%></h3></a></li>
        <li uk-filter-control=".tag-month-8" class="<%=data._this.currentMonth == 8 ? "uk-active": "uk-hidden"%>" data-index="8"><a href="#"><h3 class="uk-margin-remove-bottom">September <%=data._this.year%></h3></a></li>
        <li uk-filter-control=".tag-month-9" class="<%=data._this.currentMonth == 9 ? "uk-active": "uk-hidden"%>" data-index="9"><a href="#"><h3 class="uk-margin-remove-bottom">Oktober <%=data._this.year%></h3></a></li>
        <li uk-filter-control=".tag-month-10" class="<%=data._this.currentMonth == 10 ? "uk-active": "uk-hidden"%>" data-index="10"><a href="#"><h3 class="uk-margin-remove-bottom">November <%=data._this.year%></h3></a></li>
        <li uk-filter-control=".tag-month-11" class="<%=data._this.currentMonth == 11 ? "uk-active": "uk-hidden"%>" data-index="11"><a href="#"><h3 class="uk-margin-remove-bottom">Desember <%=data._this.year%></h3></a></li>
		<li class="next-month"><a href="" class="uk-icon-button uk-margin-small-right" uk-icon="icon-d-arrow-right"></a></li>
    </ul>
	<ul class="js-filter" uk-grid>
	<%_.each(data.posts, function(posts, key){%>
        <%_.each(posts, function(post){%>
		<%var meta = bjb.getMeta(post.metas, "custom","General")%>
		<li class="tag-month-<%=key%> <%=data._this.column%>">
			<a <%=bjb.getAttr({
					class:[ 'uk-link-reset' ],
					href:[(meta.useRedirectLink === true ? meta.redirectLink : bjb.getPostUrl(post.postTypeSlug))],
					target:[meta.useRedirectLink === true && meta.newTab === true ? "_blank" : "_self"],

				})%>>
				<div class="uk-card uk-card-default uk-card-small uk-card-hover">
					<%if(post.thumbnailImage !== null && post.thumbnailImage !== ""){%>
					<div class="uk-card-media-top uk-inline">
					  <img data-src="<%=bjb.getImageSrc(post.thumbnailImage)%>" class="uk-width-1-1" data-uk-img/>
					  <div class="uk-position-cover" style="background:#14517D;opacity:0.75">
							<div class="uk-position-center uk-text-center">
								<%
								var postDate = new Date(post.createdDate);
								var month = moment(post.createdDate).locale("id").format("MMMM");
								%>
								<h2 class="uk-margin-remove-top uk-margin-remove-bottom" style="color:#ffffff;"><%=postDate.getDate()%></h3>
								<h3 class="uk-margin-remove-top uk-margin-remove-bottom" style="color:#ffffff;"><%=month%></h3>
							</div>
						</div>
					</div>
					<%} else if(post.featuredImage !== null && post.featuredImage !== "") {%>
					<div class="uk-card-media-top uk-inline">
						<img data-src="<%=bjb.getImageSrc(post.featuredImage)%>" class="uk-width-1-1" data-uk-img/>
						<div class="uk-position-cover" style="background:#14517D;opacity:0.75">
							<div class="uk-position-center uk-text-center">
								<%
								var postDate = new Date(post.createdDate);
								var month = moment(post.createdDate).locale("id").format("MMMM");
								%>
								<h2 class="uk-margin-remove-top uk-margin-remove-bottom" style="color:#ffffff;"><%=postDate.getDate()%></h3>
								<h3 class="uk-margin-remove-top uk-margin-remove-bottom" style="color:#ffffff;"><%=month%></h3>
							</div>
						</div>
					</div>
					<%}%>
					<div class="uk-card-body">
						<p class="uk-text-meta">
						<span data-uk-icon="icon: icon-clock; ratio: .7;" class="uk-icon"></span>
						<%if(meta.useStartDate === true){%>
						Periode <span data-uk-ef_date_label="date:<%=meta.startDate%>;format:DD/MM/YYYY"></span> - 
						<%} else {%>
						Berlaku Hingga
						<%}%>
						<span data-uk-ef_date_label="date:<%=meta.endDate%>;format:DD/MM/YYYY">
						</p>
						<h3 class="uk-card-title"><%=bjb.getPostTitle(post.title, post.i81n)%></h3>
						<p><%=bjb.getPostExcerpt(post.excerpt, post.i81n)%></p>
					</div>
					<div class="uk-card-footer uk-flex uk-flex-middle">
						<p class="uk-button uk-button-text">Selengkapnya </p>
						<div class="uk-child-width-auto uk-grid-small uk-flex-inline uk-flex-middle is-single-share-link" uk-grid>
							<a class="uk-first-column" href="https://www.facebook.com/sharer/sharer.php?u=<%=_.escape(bjb.baseURI+post.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Facebook share icon">
								<span uk-icon="icon: icon-facebook; ratio: 1"></span>
							</a>
							<a class="" href="https://twitter.com/intent/tweet?url=<%=_.escape(bjb.baseURI+post.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Twitter share icon">
								<span uk-icon="icon: icon-twitter; ratio: 1"></span>
							</a>
							<a class="" href="https://api.whatsapp.com/send?text=<%=_.escape(bjb.baseURI+post.postTypeSlug)%>" target="_blank" rel="noopener" aria-label="Whatsapp share icon">
								<span uk-icon="icon: icon-whatsapp; ratio: 1"></span>
							</a>
						</div>
					</div>
				</div>
			</a>
		</li>
		<%})%>
	<%})%>
	</ul>
	</div>
</div>
</script>
    <script type="text/template" id="template-content-builder-render-side-nav">
    <%if(_.isArray(data) || _.isObject(data)){%>
    <div class="uk-flex-column uk-flex uk-visible@m sidenav-menu-button-container">

        <%_.each(data, function(nav,i){%>
            <a 
                class="sidenav-menu-button" 
                <%if(nav.link !== ""){%>
                    href="<%=nav.link%>" aria-expanded="false"
                <%} else {%>
                    href="#<%=nav.id%>" data-uk-toggle=""
                <%}%> 
                style="top:<%=(i * 55)+200%>px;"
                >
                <span data-uk-icon="icon:<%=nav.icon%>;ratio:1.25"></span>
                <span class="uk-margin-small-left"><%=nav.title%></span>
            </a>
        <%})%>
    </div>
    <%_.each(data, function(nav,i){%>
        <div id="<%=nav.id%>" data-uk-offcanvas="mode: slide; overlay: true; flip: true" class="ef-offcanvas-sidenav">
          <div class="uk-offcanvas-bar" style="overflow-x: hidden;">
            <button title="Close Off Canvas" class="uk-offcanvas-close" type="button" data-uk-close></button>
            <div class="uk-child-width-1-1 uk-grid uk-grid-stack uk-margin" data-uk-grid="">
              <div class="uk-panel">
                  <div class="data-uk-content_builder_render side-nav-content" data-uk-content_builder_render="template-part:mobilenav" data-index="<%=i%>"></div>
              </div>
            </div>
          </div>
        </div>
    <%})%>
    <div class="uk-hidden@m" style="position: fixed;bottom:0;width:100vw;"> 
        <div class="uk-container uk-background-primary uk-light uk-padding-remove-left uk-padding-remove-right">
            <div class="uk-flex uk-child-width-expand">
                <%_.each(data, function(nav,i){%>
                <div style="border-left: 1px solid rgba(255,255,255,0.2);">
                    <a class="sidenav-menu-button-mobile"
                        <%if(nav.link !== ""){%>
                            href="<%=nav.link%>" aria-expanded="false"
                        <%} else {%>
                            href="#<%=nav.id%>" data-uk-toggle=""
                        <%}%> 
                        style="top:<%=(i * 55)+200%>px;"
                    >
                        <span class="uk-panel uk-flex uk-flex-center">
                                <span class="uk-margin-small-top uk-margin-small-bottom uk-flex uk-flex-middle uk-flex-column">
                                    <span data-uk-icon="icon:<%=nav.icon%>;ratio:1.25"></span>
                                    <span style="font-size:0.75rem" class="uk-text-light"><%=nav.title%></span>
                                </span>
                        </span>
                    </a>
                </div>
                
                <%})%>
            </div>
        </div>
    </div>
    <%}%>
</script>
    <script type="text/template" id="template-content-builder-render-left-side-nav">
    <%if(_.isArray(data) || _.isObject(data)){%>
    <div class="uk-flex-column uk-flex uk-visible@m">
        
        <%_.each(data, function(nav,i){%>
            <a class="left-sidenav-menu-button" href="<%=nav.link%>" aria-expanded="false"  style="top:<%=(i * 55)+200%>px;">
                <div class="uk-flex-wrap-around uk-flex-middle left-sidenav-menu-button-container">
                    <span data-uk-icon="icon:<%=nav.icon%>;ratio:2"></span>
                    <span class="left-sidenav-title uk-margin-small-left"><%=nav.title%></span>
                </div>
            </a>
        <%})%>
    </div>
    <%}%>
</script>
    <script type="text/template" id="template-content-builder-render-jarkan-walker">
<%if(!_.isEmpty(data._this.message)){%>
	<div class="uk-alert-warning uk-border-rounded" uk-alert>
		<a class="uk-alert-close" uk-close></a>
		<p><%=data._this.message%></p>
	</div>
<%}%>
<%if(data._this.enableTriggerButton === true){%>
<div class="uk-alert-primary uk-border-rounded" uk-alert>
	<a class="uk-alert-close" uk-close></a>
	<p>Untuk menggunakan fitur kantor terdekat, Anda perlu mengaktifkan layanan lokasi pada perangkat Anda. Jika fitur geolokasi tidak aktif, kami tidak akan dapat menampilkan hasil yang berhubungan dengan lokasi Anda</p>
	<p align="right">
		<button class="uk-button uk-button-tertiary load-near-location" type="button">Tampilkan Lokasi</button>
	</p>
</div>
<%}%>
<div class="uk-grid uk-grid-match is-card-report" data-uk-grid data-uk-height-match="target: > div > a > .uk-card > .uk-card-body">
	<%_.each(data.posts, function(post){%>
	<%var meta = bjb.getMeta(post.metas, "custom","General")%>
	<div class="<%=data._this.column || "uk-width-1-2@m"%>">
		<div class="uk-card uk-card-small uk-card-hover">
			<a <%=bjb.getAttr({
					class:[ 'uk-link-reset jarkan-link' ],
					href:["javascript:void(0)"],
					"data-address":`${post.alamat}, Kel. ${post.village.name}, Kec. ${post.village.district.name}, ${post.village.district.city.name}`
				})%>>
				<div class="is-card-report-view" title="Lihat dokumen" data-uk-icon="icon: icon-location; ratio: .85;"></div>
				<div class="uk-card-body">
					<p class="uk-text-meta"><%=post._Type%></p>
					<h3 class="uk-card-title"><%=post.jaringanKantor%></h3>
					<%if(post._Type == "ATM"){%>
						<p class="uk-text-meta"><%=post.alamat%></p>
					<%} else {%>
						<p class="uk-text-meta"><%=post.alamat%>, Kel. <%=post.village.name%>, Kec. <%=post.village.district.name%>, <%=post.village.district.city.name%></p>
					<%}%>
					
				</div>
			</a>
			<div class="uk-card-footer">
				<a href="https://www.google.com/maps/dir/?api=1&destination=<%=post.alamat%>" target="_blank" class="uk-button uk-button-text">Lihat di Google Map</a>
			</div>
		</div>
	</div>
	<%})%>
</div>
<%if(data._this.isPagination){%>
	<div class="uk-margin" data-uk-ef_pagination="total:<%=data.info.totalPage%>;current-page:<%=data.info.currentPage%>;length:<%=data._this.limit%>"></div>
<%}%>
</script>
    <script type="text/template" id="template-content-builder-render-single-post-block">
    <div class="blog-main-content"></div>
</script>
    <script type="text/template" id="template-content-builder-render-term-filter">
	<%
	var isActive = true;
	%>
	<div class="uk-margin">
		<%if(data.style == "tab"){%>
			<%if(!_.isEmpty(data.title)){%>
				<span class="uk-width-1-1 uk-text-small uk-hidden@m"><%=data.title%></span>
			<%}%>
			<ul uk-tab class="uk-visible@m ef-post-filter">
				<%if(!_.isEmpty(data.title)){%>
					<li class="uk-tabnav__item uk-disabled"><a><span class="uk-tabnav__link"><%=data.title%></span></a></li>
				<%}%>
				<%if(!data.disableAllFilter){%>
					<li class="uk-tabnav__item uk-active"><a class="uk-tabnav__link" href="#" data-field="<%=data.field%>" data-filter="">Semua</a></li>
				<%
					isActive = false;
				}
				%>
				<%_.each(data.terms, function(term){%>
					<li class="uk-tabnav__item<%=isActive ? " uk-active" : ""%>"><a class="uk-tabnav__link" href="#" data-field="<%=data.field%>" data-filter="<%=term.slug%>"><%=term.displayName%></a></li>
				<%
				isActive = false;
				})
				%>
			</ul>
		<%} else {%>
			<%if(!_.isEmpty(data.title)){%>
				<span class="uk-width-1-1 uk-text-small"><%=data.title%></span>
			<%}%>
			<ul class="uk-visible@m uk-subnav-pill uk-grid-small ef-post-filter uk-flex uk-padding-remove uk-width-1-1" data-uk-switcher data-uk-grid>
				<%if(!data.disableAllFilter){%>
					<li class="uk-active uk-width-auto"><a class="uk-subnav__link" href="#" data-field="<%=data.field%>" data-filter="">Semua</a></li>
				<%
					isActive = false;
				}
				%>
				<%_.each(data.terms, function(term){%>
					<li class="uk-width-auto<%=isActive ? " uk-active" : ""%>"><a class="uk-subnav__link" href="#" data-field="<%=data.field%>" data-filter="<%=term.slug%>"><%=term.displayName%></a></li>
				<%
				isActive = false;
				})
				%>
			</ul>
		<%}%>
		<div class="uk-hidden@m uk-width-1-1 uk-margin-bottom">
			<select data-uk-ef_select class="uk-select ef-post-filter-mobile" aria-label="Select">
				<option value="">
					Semua
				</option>
				<%_.each(data.terms, function(term){%>
					<option value="<%=term.slug%>" data-field="<%=data.field%>" data-filter="<%=term.slug%>">
						<%=term.displayName%>
					</option>
				<%})%>
			</select>
		</div>
		<%if(data.enableBottomDivider){%>
		<hr/>
		<%}%>
	</div>
</script>
    <script type="text/template" id="template-content-builder-render-posts-running-walker">
<a href="#" data-uk-ef_running_text class="" style="color:<%=data._this.textColor%>;"
    data-texts="<%=_.escape(JSON.stringify(_.map(data.posts, function(post){
        return post.excerpt;
    })))%>"
    data-links="<%=_.escape(JSON.stringify(_.map(data.posts, function(post){
        return bjb.getPostUrl(post.postTypeSlug);
    })))%>"
>
</a>
</script>
    <script type="text/template" id="template-content-builder-render-form-email-notification-institution">
	<tr>
        <td>
            <input class="uk-input pics-nama" type="text" placeholder="Nama..." name="Pics[<%=data.index%>][InstitutionPicName]"/>
        </td>
        <td>
            <input class="uk-input pics-email" type="email" placeholder="Email..." name="Pics[<%=data.index%>][InstitutionPicEmail]"/>
        </td>
        <td>
            <input class="uk-input pics-position" type="text" placeholder="Jabatan..." name="Pics[<%=data.index%>][InstitutionPicPosition]"/>
        </td>
        <td>
            <button type="button" class="uk-button uk-button-danger uk-button-small remove-item" data-uk-icon="trash"></button>
        </td>
    </tr>
</script>

    <!-- Skeletons -->
    <script type="text/template" id="template-content-builder-render-jarkan-walker-skeleton">
	<div class="uk-grid uk-grid-match is-card-report" data-uk-grid data-uk-height-match="target: > div > a > .uk-card > .uk-card-body">
		<%_.each([1,2,3,4,5,6], function(post){%>
		<div class="uk-width-1-2@m">
			<div class="uk-card uk-card-small uk-card-hover">
				<div class="is-card-report-view" title="Lihat dokumen" data-uk-icon="icon: icon-location; ratio: .85;"></div>
				<div class="uk-card-body">
					<div class="uk-text-meta skeleton skeleton-footer"></div>
					<h3 class="uk-card-title skeleton skeleton-text__body"></h3>
					<p class="uk-text-meta skeleton skeleton-text"></p>
				</div>
				<div class="uk-card-footer">
					<h5 class="skeleton skeleton-footer"></h3>
				</div>
			</div>
		</div>
		<%})%>
	</div>
</script>
    <script type="text/template" id="template-content-builder-render-posts-walker-skeleton">
	<%
		data.limit = data.limit < 0 ? 6 : data.limit;
		var limit = _.range(data.limit || 6),
			column = data.column ||  "uk-width-1-3@m";
		
	%>
	<div class="uk-grid uk-grid-match is-card-report" data-uk-grid data-uk-height-match="target: > div > a > .uk-card > .uk-card-body">
		<%_.each(limit, function(post){%>
		<div class="<%=column%>">
			<div class="uk-card uk-card-small uk-card-hover">
				<div class="uk-card-media-top skeleton">
                    <div style="height:244.34px;"></div>
                </div>
				<div class="uk-card-body">
                    <h3 class="uk-card-title skeleton skeleton-footer uk-margin-bottom"></h3>
					<span class="uk-text-meta skeleton skeleton-text"></span>
                    <span class="uk-text-meta skeleton skeleton-text"></span>
				</div>
				<div class="uk-card-footer">
					<h5 class="skeleton skeleton-footer"></h3>
				</div>
			</div>
		</div>
		<%})%>
	</div>
</script>
    <script type="text/template" id="template-content-builder-render-posts-walker-asset-skeleton">
	<div class="uk-grid uk-grid-small uk-grid-divider is-card-report" data-uk-grid data-uk-height-match="target: > div > a > .uk-card > .uk-card-body">
		<%_.each([1,2,3], function(post){%>
		<div class="uk-width-1-1@m">
            <div data-uk-grid>
                <div class="uk-width-2-5">
                    <h5 class="uk-text-meta skeleton skeleton-text"></h5>
                </div>
                <div class="uk-width-expand">
                    <ul class="uk-grid-divider uk-grid-small uk-child-width-1-3 uk-flex-right" data-uk-grid>
                        <li>
                            <h5 class="uk-text-meta skeleton skeleton-text"></h5>
                        </li>
                    </ul>
                </div>
            </div>
		</div>
		<%})%>
	</div>
</script>
    <script type="text/template" id="template-content-builder-render-posts-walker-news-skeleton">
	<%
		data.limit = data.limit < 0 ? 6 : data.limit;
		var limit = _.range(data.limit || 6),
			column = data.column ||  "uk-width-1-3@m";
	%>
	<div class="uk-grid uk-grid-match is-card-report" data-uk-grid data-uk-height-match="target: > div > a > .uk-card > .uk-card-body">
		<%_.each(limit, function(post){%>
		<div class="<%=column%>">
			<div class="uk-card uk-card-small uk-card-hover">
				<div class="uk-card-media-top skeleton">
                    <div style="height:244.34px;"></div>
                </div>
				<div class="uk-card-body">
                    <h3 class="uk-card-title skeleton skeleton-footer uk-margin-bottom"></h3>
					<span class="uk-text-meta skeleton skeleton-text"></span>
                    <span class="uk-text-meta skeleton skeleton-text"></span>
				</div>
				<div class="uk-card-footer">
					<h5 class="skeleton skeleton-footer"></h3>
				</div>
			</div>
		</div>
		<%})%>
	</div>
</script>
    <script type="text/template" id="template-content-builder-render-posts-walker-search-skeleton">
	<div class="uk-grid uk-grid-match is-card-report" data-uk-grid data-uk-height-match="target: > div > a > .uk-card > .uk-card-body">
		<%_.each([1,2,3,4,5,6], function(post){%>
		<div class="uk-width-3-4@m">
			<div class="uk-card uk-card-default uk-card-hover uk-card-small uk-grid-collapse" data-uk-grid>
				<div class="uk-card-media-left uk-width-1-4 skeleton">
					<div style="height:244.34px;width:100%;"></div>
				</div>
				<div class="uk-width-3-4">
					<div class="uk-card-body">
						<span class="uk-text-meta skeleton skeleton-footer"></span>
						<p class="uk-margin-large">
							<span class="uk-text-meta skeleton skeleton-text"></span>
							<span class="uk-text-meta skeleton skeleton-text"></span>
							<span class="uk-text-meta skeleton skeleton-footer"></span>
						</p>
						<span class="uk-text-meta skeleton skeleton-footer"></span>
					</div>
				</div>
			</div>
		</div>
		<%})%>
	</div>
</script>
    <script type="text/template" id="template-content-builder-render-posts-walker-error">
	<div class="uk-placeholder">
		<div class="uk-flex-middle uk-margin-large-top uk-margin-large-bottom" data-uk-grid>
			<div class="uk-width-auto">
				<img src="../assets/img/not-found-icon.svg" width="80" height="80" uk-svg>
			</div>
			<div class="uk-width-expand">
				<h3><%=data.message%></h3>
			</div>
		</div>
	</div>
</script>
    <script type="text/template" id="template-content-builder-render-posts-slider-style-2-walker-skeleton">
	<%
		var limit = _.range(data.limit || 3),
			column = data.column ||  "uk-width-1-3@m";
	%>
	<div class="uk-grid uk-grid-match is-card-report" data-uk-grid data-uk-height-match="target: > div > a > .uk-card > .uk-card-body">
		<div class="uk-width-1-1">
			<div class="uk-card uk-card-small uk-card-hover">
				<div class="uk-card-media-top skeleton">
                    <div style="height:244.34px;"></div>
                </div>
				<div class="uk-card-body">
                    <h3 class="uk-card-title skeleton skeleton-footer uk-margin-bottom"></h3>
					<span class="uk-text-meta skeleton skeleton-text"></span>
                    <span class="uk-text-meta skeleton skeleton-text"></span>
				</div>
				<div class="uk-card-footer">
					<h5 class="skeleton skeleton-footer"></h3>
				</div>
			</div>
		</div>
	</div>
</script>
    <script type="text/template" id="template-content-builder-render-currency-calculator-skeleton">
<div data-uk-grid>
  <div class="uk-width-2-3@m">
    <table class="uk-table">
      <thead>
        <tr style="background-color:#2fa0de; color:#ffffff !important;">
            <th style="font-weight: bold; vertical-align:middle;" rowspan="2" class="text-center">
                <span id="ContentPlaceHolder1_lblKursValuta" style="color:#ffffff !important;">Mata Uang</span>
            </th>
            <th style="font-weight: bold;" colspan="2" class="text-center">
                <div class="uk-width-1-1">TT Special	</div>
                <label class="uk-width-auto"><h5 class="uk-text-meta skeleton skeleton-text"></h5></label>
                <label><h5 class="uk-text-meta skeleton skeleton-text"></h5></label>
            </th>
            <th style="font-weight: bold;" colspan="2" class="text-center">
                <div class="uk-width-1-1" class="d-block">TT Counter</div>
                <label class="uk-width-auto"><h5 class="uk-text-meta skeleton skeleton-text"></h5></label>
                <label><h5 class="uk-text-meta skeleton skeleton-text"></h5></label>
            </th>
            <th style="font-weight: bold;" colspan="2" class="text-center">
                <div class="uk-width-1-1" class="d-block">Bank Notes</div>
                <label class="uk-width-auto"><h5 class="uk-text-meta skeleton skeleton-text"></h5></label>
                <label><h5 class="uk-text-meta skeleton skeleton-text"></h5></label>
            </th>
        </tr>
        <tr style="background-color:#eec92c;">
            <th style="font-weight: bold;background-color:#2BA7DF;" class="text-center">
                <span id="ContentPlaceHolder1_lblKursBeli">Beli</span>
            </th>
            <th style="font-weight: bold;background-color:#1C84B4;" class="text-center">
                <span id="ContentPlaceHolder1_lblKursJual">Jual</span>
            </th>
            <th style="font-weight: bold;background-color:#2BA7DF;" class="text-center">
                <span id="ContentPlaceHolder1_Label2">Beli</span>
            </th>
            <th style="font-weight: bold;background-color:#1C84B4;" class="text-center">
                <span id="ContentPlaceHolder1_Label3">Jual</span>
            </th>
            <th style="font-weight: bold;background-color:#2BA7DF;" class="text-center">
                <span id="ContentPlaceHolder1_Label5">Beli</span>
            </th>
            <th style="font-weight: bold;background-color:#1C84B4;" class="text-center">
                <span id="ContentPlaceHolder1_Label6">Jual</span>
            </th>
        </tr>
      </thead>
    
    <%_.each(_.range(9), function(post){%>
          <tr>
            <td><h5 class="uk-text-meta skeleton skeleton-text"></h5></td>
            <td><h5 class="uk-text-meta skeleton skeleton-text"></h5></td>
            <td><h5 class="uk-text-meta skeleton skeleton-text"></h5></td>
            <td><h5 class="uk-text-meta skeleton skeleton-text"></h5></td>
            <td><h5 class="uk-text-meta skeleton skeleton-text"></h5></td>
            <td><h5 class="uk-text-meta skeleton skeleton-text"></h5></td>
            <td><h5 class="uk-text-meta skeleton skeleton-text"></h5></td>
          </tr>
      <%})%>
    </table>
  </div>
  <div class="uk-width-1-3@m">
    <div class="cnt-calc cnt-calc uk-card uk-card-default uk-card-hover uk-card-body">
      <div class="form-inline row" style="padding: 10px;">
          <div class="uk-width-1-1 dropbox mb-2 kurs-box p-0">
              <span style="font-weight: bolder;">Pilihan Jenis </span>
          </div>
          <div class="form-group col-lg-8 col-sm-12 dropbox mb-2 kurs-box p-0">
              <i class="down-arrow-calc" style="left:72%;"></i>
              <select data-uk-ef_select name="ctl00$ContentPlaceHolder1$cmbSelectJenis" id="ContentPlaceHolder1_cmbSelectJenis" class="uk-select cmbJenis" style="margin-left:0px;">
                <option value="beli">Beli</option>
                <option value="jual">Jual</option>
              </select>
          </div>
      </div>
      <div data-uk-grid>
          <div class="uk-width-auto dropbox mb-2 kurs-box p-0">
              <i class="down-arrow-calc" style="left:65px;"></i>
              <select data-uk-ef_select name="ctl00$ContentPlaceHolder1$cmbKalkulator1" id="ContentPlaceHolder1_cmbKalkulator1" class="uk-select calc-control calc1" style="margin-left:0px;">
              </select>
          </div>
          <div class="uk-width-expand dropbox dropbox-nominal mb-2 p-0">
              <input name="ctl00$ContentPlaceHolder1$txtNominalKurs" type="text" id="ContentPlaceHolder1_txtNominalKurs" placeholder="Masukan Nominal" pattern="[0-9]*" class="uk-input form-control-input-calc txtNominal1 numberOnly"  style="margin-left:0px; width:100%;"  inputmode="numeric">
          </div>
      </div>
      <div data-uk-grid>
          <div class="uk-width-auto dropbox mb-2 kurs-box p-0">
              <i class="down-arrow-calc" style="left:65px;"></i>
              <select data-uk-ef_select name="ctl00$ContentPlaceHolder1$cmbKalkulator2" id="ContentPlaceHolder1_cmbKalkulator2" class="uk-select calc-control calc2" style="margin-left:0px;">
              </select>
          </div>
          <div class="uk-width-expand dropbox dropbox-nominal mb-2 p-0">
              <input type="text" class="uk-input form-control-input-calc txtNominal2" style="margin-left:0px; width:100%;" id="" placeholder="" readonly="">
          </div>
      </div>
    </div>
  </div>
</div>
</script>

    <!-- Templates -->
    <script type="text/template" id="template-content-builder-render-template-pagetitle">
    <section 
        class="uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext" 
        uk-height-viewport="offset-top: true; offset-bottom: 60;"
    >
        <div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
        <div class="uk-container">
            <div class="uk-position uk-position-left-center uk-width-1-1 uk-width-4-5@s uk-width-1-3@m uk-width-1-3@l">
                <h1><%=bjb.getPostTitle(data.post.title, data.post.i81n)%> </h1>
                <p><%=bjb.getPostExcerpt(data.post.excerpt, data.post.i81n)%> </p>
            </div>
        </div>
    </section>
</script>
    <script type="text/template" id="template-content-builder-render-template-pagetitle-video">
    <section class="uk-section uk-padding-remove-vertical is-pageheader is-pageheader-video">
        <div class="uk-container-expand">
            <div class="uk-cover-container is-pageheader-video-ratio">
                <iframe src="<%=data.metas.video%>?autoplay=1&loop=1" width="<%=data.metas.videoAspectRatioWidth%>" height="<%=data.metas.videoAspectRatioHeight%>" frameborder="0" allowfullscreen class="uk-width-1-1 uk-height-1-1" data-uk-video="autoplay:true;"></iframe>
            </div>
        </div>
    </section>
</script>
    <script type="text/template" id="template-content-builder-render-template-pagetitle-image">
    <section class="uk-section uk-padding-remove-vertical is-pageheader is-pageheader-image">
        <div class="uk-container-expand">
            <div data-uk-grid>
                <div class="uk-width-1-1 uk-width-1-1@s uk-width-1-1@m uk-width-1-1@l">
                    <picture class="uk-flex uk-flex-center">
                        <img data-src="<%=bjb.getImageSrc(data.metas.image)%>" data-uk-img>
                    </picture>
                </div>
            </div>
        </div>
    </section>
</script>
    <script type="text/template" id="template-content-builder-render-template-pagetitle-text-image">
    <%
        if(!_.isNumber(data.metas.imageHeight) && _.isBoolean(data.metas.imageHeight) ){
            data.metas.imageHeight = data.metas.imageHeight;
        } else if( !_.isNumber(data.metas.imageHeight) && _.isEmpty(data.metas.imageHeight) ){
            data.metas.imageHeight = 60;
            data.metas.useCustomImageHeight = true;
            data.metas.customImageHeightDesktop = "400px";
            data.metas.customImageHeightTab = "400px";
            data.metas.customImageHeightMobile = "400px";
        } 
        data.metas.customImageHeightDesktop = _.isEmpty(data.metas.customImageHeightDesktop) ? "400px" : data.metas.customImageHeightDesktop;
        data.metas.customImageHeightTab = _.isEmpty(data.metas.customImageHeightTab) ? "400px" : data.metas.customImageHeightTab;
        data.metas.customImageHeightMobile = _.isEmpty(data.metas.customImageHeightMobile) ? "400px" : data.metas.customImageHeightMobile;
    %>
   
    <section 
        class="uk-hidden@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext" 
        <%if(_.isEmpty(data.metas.headerStyle) && !data.metas.useCustomImageHeight){%>
            style="background-image:url(<%=bjb.getImageSrc(data.metas.imageMobile||data.metas.image)%>);height:60vh"
        <%}%>
        
        <%if(_.isEmpty(data.metas.headerStyle) && data.metas.useCustomImageHeight){%>
            style="background-image:url(<%=bjb.getImageSrc(data.metas.imageMobile||data.metas.image)%>);height:<%=data.metas.customImageHeightMobile%>"
        <%}%>
    >
        <%if(_.isEmpty(data.metas.headerStyle)){%>
        <div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
        <div class="uk-container">
            <div class="uk-position uk-position-left-center uk-width-4-5 uk-width-4-5@s uk-width-3-5@m uk-width-3-5@l">
                <h1 class="<%=data.metas.titleHeading%>"><%=data.metas.title%> </h1>
                <p><%=data.metas.subTitle%> </p>
            </div>
        </div>
        <%} else {%>
            <div class="uk-container">
                <div class="uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light" data-src="<%=bjb.getImageSrc(data.metas.image)%>" uk-img="loading: eager"></div>
            </div>
        <%}%>
    </section>
    <section 
        class="uk-hidden@l uk-visible@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext" 
        <%if(_.isEmpty(data.metas.headerStyle) && !data.metas.useCustomImageHeight){%>
            style="background-image:url(<%=bjb.getImageSrc(data.metas.imageTab||data.metas.image)%>)"
            uk-height-viewport="offset-top: true; offset-bottom: <%=data.metas.imageHeight%>;"
        <%}%>
        <%if(_.isEmpty(data.metas.headerStyle) && data.metas.useCustomImageHeight){%>
            style="background-image:url(<%=bjb.getImageSrc(data.metas.imageTab||data.metas.image)%>);height:<%=data.metas.customImageHeightTab%>"
        <%}%>
    >
        <%if(_.isEmpty(data.metas.headerStyle)){%>
            <div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
            <div class="uk-position uk-position-bottom-left uk-width-4-5">
                <div class="uk-container">
                    <h1 class="<%=data.metas.titleHeading%>"><%=data.metas.title%> </h1>
                    <p class="uk-margin-bottom"><%=data.metas.subTitle%> </p>
                </div>
            </div>
            
        <%} else {%>
            <div class="uk-container">
                <div class="uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light" data-src="<%=bjb.getImageSrc(data.metas.image)%>" uk-img="loading: eager"></div>
            </div>
        <%}%>
    </section>
    <section 
        class="uk-visible@l uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext" 
        <%if(_.isEmpty(data.metas.headerStyle) && !data.metas.useCustomImageHeight){%>
            style="background-image:url(<%=bjb.getImageSrc(data.metas.image)%>)"
            uk-height-viewport="offset-top: true; offset-bottom: <%=data.metas.imageHeight%>;"
        <%}%>
        <%if(_.isEmpty(data.metas.headerStyle) && data.metas.useCustomImageHeight){%>
            style="background-image:url(<%=bjb.getImageSrc(data.metas.image)%>);height:<%=data.metas.customImageHeightDesktop%>"
        <%}%>
    >
        <%if(_.isEmpty(data.metas.headerStyle)){%>
            <div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
            <div class="uk-position uk-position-bottom-left uk-width-1-1 uk-width-4-5@s uk-width-3-5@m uk-width-1-1@l">
                <div class="uk-container">
                    <h1 class="<%=data.metas.titleHeading%>"><%=data.metas.title%> </h1>
                    <p class="uk-margin-bottom"><%=data.metas.subTitle%> </p>
                </div>
            </div>
            
        <%} else {%>
            <div class="uk-container">
                <div class="uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light" data-src="<%=bjb.getImageSrc(data.metas.image)%>" uk-img="loading: eager"></div>
            </div>
        <%}%>
    </section>

</script>
    <script type="text/template" id="template-content-builder-render-template-pagetitle-block-image">
    <section 
        class="uk-hidden@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext uk-height-medium" 
        <%if(_.isEmpty(data.metas.headerStyle)){%>
            style="background-image:url(<%=bjb.getImageSrc(data.metas.image)%>)"
            uk-height-viewport="offset-top: true; offset-bottom: <%=!_.isUndefined(data.metas.afterPageTitle) && data.metas.afterPageTitle != "" ? "true":"60"%>;"
        <%}%>
    >
        <%if(_.isEmpty(data.metas.headerStyle)){%>
        <div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
        <div class="uk-container">
            <div class="uk-position uk-position-bottom-center uk-position-large uk-width-1-1 uk-width-4-5@s uk-width-1-3@m uk-width-1-3@l">
            <%if(!_.isUndefined(data.metas.blockHeroImage) && !_.isEmpty(data.metas.blockHeroImage) ){
            var block = data.metas.blockHeroImage.split("|")[0];
            %>
                <div data-uk-ef_blog_post="post-type-slug:<%=block%>;post-type:Block;"></div>
            <%}%>
            </div>
        </div>
        <%} else {%>
            <div class="uk-container">
                <div class="uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light" data-src="<%=bjb.getImageSrc(data.metas.image)%>" uk-img="loading: eager"></div>
            </div>
        <%}%>
    </section>
    <section 
        class="uk-visible@m uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext" 
        <%if(_.isEmpty(data.metas.headerStyle)){%>
            style="background-image:url(<%=bjb.getImageSrc(data.metas.image)%>)"
            uk-height-viewport="offset-top: true; offset-bottom: <%=!_.isUndefined(data.metas.afterPageTitle) && data.metas.afterPageTitle != "" ? "true":"60"%>;"
        <%}%>
    >
        <%if(_.isEmpty(data.metas.headerStyle)){%>
        <div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
        <div class="uk-container">
            <div class="uk-position-medium uk-position-bottom uk-width-1-1">
        <%if(!_.isUndefined(data.metas.blockHeroImage) && !_.isEmpty(data.metas.blockHeroImage) ){
            var block = data.metas.blockHeroImage.split("|")[0];
            %>
            <div class="uk-container">
                <div data-uk-ef_blog_post="post-type-slug:<%=block%>;post-type:Block;"></div>
            </div>
            <%}%>
            </div>
        </div>
        <%} else {%>
            <div class="uk-container">
                <div class="uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light" data-src="<%=bjb.getImageSrc(data.metas.image)%>" uk-img="loading: eager"></div>
            </div>
        <%}%>
    </section>
</script>
    <script type="text/template" id="template-content-builder-render-template-pagetitle-two-lines-text-image">
    <!-- <section class="uk-section uk-light is-pageheader is-pageheader-custom bg-kukm" style="background-image:url(<%=bjb.getImageSrc(data.metas.image)%>)">
        <div class="uk-container">
            <div data-uk-grid>
                <div <%=bjb.getAttr({
                class:[
                    data.metas.desktopWidth + "@l",
                    data.metas.tabletWidth + "@m",
                    data.metas.mobileWidth + "@s",
                    "uk-width-1-1"
                ]
              })%>>
                <h1 style="color:<%=data.metas.firstLineTextColor%>;" data-second-text="<%=data.metas.secondLineText%>" data-second-text-color="<%=data.metas.secondLineTextColor%>"><%=data.metas.firstLineText%> </h1>
              </div>
            </div>
        </div>
    </section> -->
    <section
        class="uk-inline uk-section uk-padding-remove-bottom uk-light uk-flex uk-flex-middle is-pageheader is-pageheader-custom bg-kukm"
        <%if(_.isEmpty(data.metas.headerStyle)){%>
        style="background-image:url(<%=bjb.getImageSrc(data.metas.image)%>)"
            uk-height-viewport="offset-top: true; offset-bottom: <%=!_.isUndefined(data.metas.afterPageTitle) &&
                data.metas.afterPageTitle !="" ? "true" :"60"%>;"
                <%}%>
                    >
                    <%if(_.isEmpty(data.metas.headerStyle)){%>
                        <div class="uk-overlay-primary uk-position-cover"
                            style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 84.17%);"></div>
                        <div class="uk-container">
                            <div
                                class="uk-position uk-position-large uk-position-bottom uk-width-1-1 uk-width-4-5@s uk-width-3-5@m uk-width-3-5@l">
                                <h1 style="color:<%=data.metas.firstLineTextColor%>;"
                                    data-second-text="<%=data.metas.secondLineText%>"
                                    data-second-text-color="<%=data.metas.secondLineTextColor%>">
                                    <%=data.metas.firstLineText%>
                                </h1>
                            </div>
                        </div>
                        <%} else {%>
                            <div class="uk-container">
                                <div class="uk-height-large uk-flex uk-flex-center uk-flex-middle uk-background-cover uk-light"
                                    data-src="<%=bjb.getImageSrc(data.metas.image)%>" uk-img="loading: eager"></div>
                            </div>
                            <%}%>
    </section>
    </script>
    <script type="text/template" id="template-content-builder-render-template-pagetitle-slider">
    <%
        slideShowItemsAttrs = {
            class:[
                "uk-slideshow-items uk-border-rounded"
            ]
        },
        slideShowAttrs = {
            class: [
                "uk-position-relative uk-visible-toggle uk-light"
            ],
            "data-uk-slideshow":"",
            "data-animation" : "fade",
            "data-autoplay": "true",
            "data-autoplay-interval": "5000",
            "data-pause-on-hover": "false"
        };
        if( !data.metas.sliderCustomRatio ){
            slideShowItemsAttrs["data-uk-height-viewport"] = contentBuilder.render.getViewportSettings(data.metas.sliderHeight);
            slideShowAttrs["data-ratio"] = "false";
        } else {
            
            slideShowAttrs["data-ratio"] = data.metas.sliderRatio;
        }
    %>
    <%if(!_.isEmpty(data.metas.headerStyle)){%>
            <section class="uk-inline uk-section uk-padding-remove-bottom uk-flex uk-flex-middle is-pageheader is-pageheader-bgtext">
                <div class="uk-container">
        <%}%>
        <div <%=bjb.getAttr(slideShowAttrs)%>>

            <ul <%=bjb.getAttr(slideShowItemsAttrs)%>>
                <%_.each(data.metas.slider, function(slider, sliderIndex){%>
                <%
                    slider.imageTab = !_.isEmpty(slider.imageTab) ? slider.imageTab : slider.imageDesktop;
                    slider.imageMobile = !_.isEmpty(slider.imageMobile) ? slider.imageMobile : slider.imageDesktop;
                %>
                <li class="uk-cover-container">
                    <%if(!_.isEmpty(slider.imageDesktop)){%>
                    <img data-src="<%=bjb.endpoints.FILE_CLIENT+"/"+slider.imageDesktop%>" alt="Slider Image Desktop" width="2600" height="800" class="uk-width-1-1 uk-visible@m" uk-img uk-cover/>
                    <%}%>
                    <%if(!_.isEmpty(slider.imageTab)){%>
                    <img data-src="<%=bjb.endpoints.FILE_CLIENT+"/"+slider.imageTab%>" alt="Slider Image Tablet" width="1600" height="600" class="uk-width-1-1 uk-visible@s uk-hidden@m" uk-img uk-cover/>
                    <%}%>
                    <%if(!_.isEmpty(slider.imageMobile)){%>
                    <img data-src="<%=bjb.endpoints.FILE_CLIENT+"/"+slider.imageMobile%>" alt="Slider Image Mobile" class="uk-visible uk-hidden@s" uk-img uk-cover/>
                    <%}%>
                    <%if(slider.text != ""){%>
                    <%if(_.isEmpty(data.metas.headerStyle)){%>
                        <div class="uk-overlay-primary uk-position-cover" style="background: linear-gradient(90deg, #0D162F 0%, rgba(18, 31, 67, 0) 0%);"></div>
                    <%}%>
                    <div class="<%=slider.position%> <%=slider.positionSize%> uk-width-1-1">
                        <div class="uk-container">
                            <div class="data-uk-content_builder_render slider-content" data-uk-content_builder_render="template-part:nowrap" data-index="<%=sliderIndex%>"></div>
                        </div>
                    </div>
                    <%}%>
                </li>
                <%})%>
            </ul>
            <div class="uk-container">
                <div class="uk-position uk-position-bottom-center uk-position-large uk-width-1-1 uk-width-4-5@s uk-width-1-3@m uk-width-1-3@l">
                <%if(!_.isUndefined(data.metas.blockHeroImage) && !_.isEmpty(data.metas.blockHeroImage) ){
                var block = data.metas.blockHeroImage.split("|")[0];
                %>
                    <div data-uk-ef_blog_post="post-type-slug:<%=block%>;post-type:Block;"></div>
                <%}%>
                </div>
            </div>
        </div>
        <%if(!_.isEmpty(data.metas.headerStyle)){%>
            </section>
                </div>
        <%}%>
</script>
