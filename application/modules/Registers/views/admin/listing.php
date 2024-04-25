<!--begin::Toolbar-->
<div class="toolbar" id="kt_toolbar">
	<!--begin::Container-->
	<div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
		<!--begin::Page title-->
		<div data-kt-place="true" data-kt-place-mode="prepend" data-kt-place-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}" class="page-title d-flex align-items-left me-3 flex-wrap mb-5 mb-lg-0 lh-1">
			<!--begin::Title-->
			<h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3"><?=$header['site_title']?></h1>
			<!--end::Title-->
			<!--begin::Separator-->
			<span class="h-20px border-gray-200 border-start mx-4"></span>
			<!--end::Separator-->
			<!--begin::Breadcrumb-->
			<ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
				<!--begin::Item-->
				<li class="breadcrumb-item text-muted">
					<a href="<?=base_url()?>" class="text-muted text-hover-primary">Home</a>
				</li>
				<!--end::Item-->
								
				<!--begin::Item-->
				<li class="breadcrumb-item">
					<span class="bullet bg-gray-200 w-5px h-2px"></span>
				</li>
				<!--end::Item-->
				<!--begin::Item-->
				<li class="breadcrumb-item text-dark"><?=$header['site_title']?></li>
				<!--end::Item-->
			</ul>
			<!--end::Breadcrumb-->
		</div>
		<!--end::Page title-->
		<!--begin::Actions-->
		
		<!--end::Actions-->
	</div>
	<!--end::Container-->
</div>
<!--end::Toolbar-->


<!--begin::Modal - Add-->
<div class="modal fade " id="kt_modal_add" tabindex="-1" aria-hidden="true">
	<!--begin::Modal dialog-->
	<div class="modal-dialog modal-dialog-centered mw-800px">
		<!--begin::Modal content-->
		<div class="modal-content">
			<!--begin::Form-->
			<?php			
				$this->load->view('admin/save'); 
			?>
			<!--end::Form-->											
		</div>
	</div>
</div>
<!--end::Modal -->

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
	<!--begin::Container-->
<div id="kt_content_container" class="container-fluid">
        <!--begin::Card-->
        <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-6">
                        <!--begin::Card title-->
                        <div class="card-title">
                                <!--begin::Search-->
                                <div class="d-flex align-items-center position-relative my-1">
                                        <!--begin::Svg Icon | path: icons/duotone/General/Search.svg-->
                                        <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24" />
                                                                <path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                                <path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z" fill="#000000" fill-rule="nonzero" />
                                                        </g>
                                                </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                        <input type="text" data-kt-listing-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Datas" />
                                </div>
                                <!--end::Search-->
                        </div>
                        <!--begin::Card title-->
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                                <!--begin::Toolbar-->
                                <div class="d-flex justify-content-end" data-kt-listing-table-toolbar="base">


                                </div>
                                <!--end::Toolbar-->
                                <!--begin::Group actions-->
                                <div class="d-flex justify-content-end align-items-center d-none" data-kt-listing-table-toolbar="selected">
                                        <div class="fw-bolder me-5">
                                        <span class="me-2" data-kt-listing-table-select="selected_count"></span>Selected</div>
                                        <button type="button" class="btn btn-danger" data-kt-listing-table-select="delete_selected">Delete Selected</button>
                                </div>
                                <!--end::Group actions-->
                        </div>
                        <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
<div class="card-body pt-0">
        <!--START::ALERT MESSAGE --><?php $this->load->view('templates/admin/alert');?><!--END::ALERT MESSAGE -->
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_listing_table">
                <!--begin::Table head-->
                <thead>
                        <!--begin::Table row-->
                        <tr class="text-start text-gray-400 fw-bolder fs-7 gs-0">
                                <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_listing_table .form-check-input" value="" />
                                        </div>
                                </th>
                                <th class="min-w-125px">Name</th>
                                <th class="min-w-125px">Email</th>
                                <th class="min-w-125px">Phone</th>
                                <th class="min-w-125px">Country</th>
                                <th class="min-w-125px">State / Province</th>
                                <th class="min-w-125px">City</th>
                                <th class="min-w-125px">Address</th>
                                <th class="min-w-125px">Birth Date</th>
                                <th class="min-w-125px">Reference</th>
                               <th class="min-w-125px">Status</th>
                                <th class="text-end min-w-70px">Actions</th>
                        </tr>
                        <!--end::Table row-->
                </thead>
                <!--end::Table head-->
                <!--begin::Table body-->
                <tbody class="fw-bold text-gray-600">
                <?php
                if(!empty($datas)){
                        foreach($datas as $k=> $rows)
                        {
                                $id = base64_encode($rows->id);
                                $edit_link = base_url('Registers/save/'.$id);
                                $delete_link = base_url('Registers/remove/'.$id);
                                $status_link = base_url('Registers/statusChange/'.$id);
                               
                                $edit['query']=$query;

                                
                ?>
                <tr id="tr_<?=$rows->id?>">							
                        <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid ">
                            <input class="form-check-input removeData" type="checkbox" value="<?=$rows->id?>" />
                        </div>

                        </td>
                       
                        <td><?=$rows->fname?> <?=$rows->lname?></td>
                        <td><?=$rows->email?></td>
                        <td><?=$rows->phone?></td>
                        <td><?=$rows->country?></td>
                        <td><?=$rows->state?></td>
                        <td><?=$rows->city?></td>
                        <td><?=$rows->address?></td>
                        <td><?=$rows->day?>/<?=$rows->month?>/<?=$rows->year?></td>
                        <td><?=$rows->where_did_you_hear?></td>
                       
                        <td data-filter="">
                          <a href="<?=$status_link?>" class="badge badge-light-<?=($rows->status=='1')?'success':'danger'?>"><?=($rows->status=='1')?'Approved':'Not Approved'?></a>
                        </td>
                        <td class="text-end">								
                                
                                <button type="button" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm" onclick="return removeData('<?=$rows->id?>');">
                                        <!--begin::Svg Icon | path: icons/duotone/General/Trash.svg-->
                                        <span class="svg-icon svg-icon-3">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                                <path d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                <path d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z" fill="#000000" opacity="0.3"></path>
                                                        </g>
                                                </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                </button>
                        </td>
                </tr>
                <!--begin::Modal - Edit-->
                <div class="modal fade " id="kt_modal_edit<?=$rows->id?>" tabindex="-1" aria-hidden="true">
                        <!--begin::Modal dialog-->
                        <div class="modal-dialog modal-dialog-centered mw-800px">
                                <!--begin::Modal content-->
                                <div class="modal-content">
                                        <!--begin::Form-->
                                        <?php $this->load->view('admin/save', $edit); ?>
                                        <!--end::Form-->											
                                </div>
                        </div>
                </div>
                        <!--end::Modal -->
                <?php
                        }
                }
                ?>	
                </tbody>
                <!--end::Table body-->
        </table>
        <!--end::Table-->
</div>
                <!--end::Card body-->
        </div>
        <!--end::Card-->

</div>
	<!--end::Container-->
</div>
						
<!--end::Post-->



<?php
$this->load->view('templates/admin/footer_scripts', $this->data);
$this->load->view('admin/_js', $this->data);
?>
