<div class="btn-group">
	@if (isset($moveUpAction))
        <a 
			title="Move Up One Row" 
			href="javascript:void(0)" 
			class="btn btn-info btn-md mr-2 order-button"
			data-url="{!! $moveUpAction !!}" 
		>
            <i class="fa fa-arrow-up"></i>
        </a>
    @endif

    @if (isset($moveDownAction))
        <a 
			title="Move Down One Row" 
			href="javascript:void(0)" 
			class="btn btn-info btn-md mr-2 order-button"
			data-url="{!! $moveDownAction !!}" 
		>
            <i class="fa fa-arrow-down"></i>
        </a>
    @endif
	
    @if ( isset( $featuredAction ) )
        <a title="set as featured" href="javascript:void(0)" data-url="{!! $featuredAction !!}" class="btn btn-success btn-md mr-2 featured-action">
            <i class="fa fa-star"></i>
        </a>
    @endif

    @if ( isset( $removeFeaturedAction ) )
        <a title="remove from featured" data-url="{!! $removeFeaturedAction !!}" class="btn btn-danger btn-md mr-2 remove-featured-action">
            <i class="fa fa-star"></i>
        </a>
    @endif

    @if (isset($publishAction))
        <a title="Publish" href="javascript:void(0)"  data-url="{!! $publishAction !!}" class="btn btn-success btn-md mr-2 status-button">
            <i class="fa fa-arrow-up"></i>
        </a>
    @endif

    @if (isset($draftAction))
        <a title="Set as Draft" href="javascript:void(0)"  data-url="{!! $draftAction !!}" class="btn btn-danger btn-md mr-2 status-button">
            <i class="fa fa-arrow-down"></i>
        </a>
    @endif

    @if (isset($upAction))
        <a title="Take Up" href="javascript:void(0)"  data-url="{!! $upAction !!}" class="btn btn-success btn-md mr-2 status-button">
            <i class="fa fa-arrow-up"></i>
        </a>
    @endif

    @if (isset($downAction))
        <a title="Take Down" href="javascript:void(0)"  data-url="{!! $downAction !!}" class="btn btn-danger btn-md mr-2 status-button">
            <i class="fa fa-arrow-down"></i>
        </a>
    @endif

    @if ( isset($viewAction) )
        <a title="View Detail" target="_blank" href="{{ $viewAction }}" data-url="{!! $viewAction !!}" class="btn btn-info btn-md mr-2">
            <i class="fa fa-eye"></i>
        </a>
    @endif

    @if ( isset($listAction) )
        <a title="List Detail" target="_blank" href="{{ $listAction }}" data-url="{!! $listAction !!}" class="btn btn-info btn-md mr-2">
            <i class="fa fa-list"></i>
        </a>
    @endif

    @if ( isset($sortUpAction) )
        <a title="Sort Up" href="javascript:void(0)" data-url="{!! $sortUpAction !!}" class="btn btn-info btn-md mr-2 sort-button">
            <i class="fa fa-arrow-up"></i>
        </a>
    @endif

    @if ( isset($sortDownAction) )
        <a title="Sort Down" href="javascript:void(0)" data-url="{!! $sortDownAction !!}" class="btn btn-info btn-md mr-2 sort-button">
            <i class="fa fa-arrow-down"></i>
        </a>
    @endif

    @if ( isset($editAction) )
        <a title="Edit" href="{{ $editAction }}" data-url="{!! $editAction !!}" class="btn btn-info btn-md mr-2">
            <i class="fa fa-edit"></i>
        </a>
    @endif

    @if ( isset($enEditAction) )
        <a title="Edit EN" href="{{ $enEditAction }}" data-url="{!! $enEditAction !!}" class="btn btn-info btn-md mr-2">
            EN
        </a>
    @endif

    @if ( isset($idEditAction) )
        <a title="Edit IN" href="{{ $idEditAction }}" data-url="{!! $idEditAction !!}" class="btn btn-info btn-md mr-2">
            ID
        </a>
    @endif

    @if (isset($activateAction))
        <a 
			title="Activate Data" 
			href="javascript:void(0)" 
			class="btn btn-success btn-md mr-2 status-button" 
			data-url="{!! $activateAction !!}" 
			data-message="You are about to activate this data."
		>
            <i class="fa fa-power-off"></i>
        </a>
    @endif

    @if (isset($deactivateAction))
        <a 
			title="Dectivate Data" 
			href="javascript:void(0)" 
			class="btn btn-warning btn-md mr-2 status-button" 
			data-url="{!! $deactivateAction !!}" 
			data-message="You are about to deactivate this data."
		>
            <i class="fa fa-power-off"></i>
        </a>
    @endif

    @if ( isset( $deleteAction ) )
        <a 
			title="Delete Data" 
			href="javascript:void(0)" 
			class="btn btn-danger btn-md mr-2 delete-button" 
			data-message="You are about to permanently delete this data."
			data-url="{!! $deleteAction !!}" 
		>
            <i class="fa fa-trash"></i>
        </a>
    @endif
</div>
