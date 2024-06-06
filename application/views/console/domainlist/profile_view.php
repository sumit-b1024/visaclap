
                        <div class="page-content-inner custo-profile">
                            <div class="profile mem-profile">
								
								<div class="btn-group pull-right">
									<a href="<?= base_url().'console/supplier/edit_supplier/'.$supplier->supplier_id; ?>" class="btn sbold uppercase btn-outline grey-salt"><i class="fa fa-pencil" aria-hidden="true"></i></a>
								</div>
								
                                <div class="profile-info">
									<h1 class="font-green sbold uppercase"><?= $supplier->firm_name; ?> <small><?= $supplier->code; ?></small></h1>
									
                                    <ul class="list-inline">
										<?php if(isset($supplier) && !empty($supplier->first_name)) { ?>
										<li>
                                            <strong><i class="fa fa-user" aria-hidden="true" title="Contact Person"></i></strong>
											<?= toProperCase($supplier->first_name.' '.$supplier->last_name); ?>
                                        </li>
										<?php } if(isset($supplier) && !empty($supplier->website)) { ?>
										<li>
                                            <strong><i class="fa fa-globe" aria-hidden="true" title="Website"></i>
											</strong> <?= $supplier->website; ?>
                                        </li>
										<?php } if(isset($supplier) && !empty($supplier->email)) { ?>
										<li>
                                            <strong><i class="fa fa-envelope-o" aria-hidden="true" title="Email"></i>
											</strong> <?= $supplier->email; ?>
                                        </li>
										<?php } if(isset($supplier) && !empty($supplier->alter_email)) { ?>
										<li>
                                            <strong><i class="fa fa-envelope-o" aria-hidden="true" title="Alternative Email"></i>
											</strong> <?= $supplier->alter_email; ?>
                                        </li>
										<?php } if(isset($supplier) && !empty($supplier->gst_no)) { ?>
										<li>
                                            <strong><i class="fa fa-credit-card" aria-hidden="true" title="GST No"></i>
											</strong> <?= $supplier->gst_no; ?>
                                        </li>
										<?php } if(isset($supplier) && !empty($supplier->pan_no)) { ?>
										<li>
                                            <strong><i class="fa fa-credit-card" aria-hidden="true" title="Pan No"></i>
											</strong> <?= $supplier->pan_no; ?>
                                        </li>
										<?php } ?>
                                    </ul>
                                    <ul class="list-inline">
                                    <?php if(isset($_contacts) && !empty($_contacts)) {
                                        foreach($_contacts as $con): ?>
                                        <li>
                                            <strong><i class="fa fa-phone" aria-hidden="true"></i>
                                            </strong> +91 <?= $con->contact; ?>
                                        </li>
                                        <?php endforeach;
                                    } ?>
                                    </ul>    
									<?php if(isset($_contact) && !empty($_contact)) { ?>
									<?php foreach($_contact as $contact): ?>
                                    <h5 class="font-red-intense bold uppercase"><?= Contact_type::getValue($contact->is_contact); ?></h5>
									<ul class="list-inline">
                                        <li>
                                            <strong><i class="fa fa-user" aria-hidden="true"></i>
                                            </strong> <?= toProperCase($contact->first_name.' '.$contact->last_name); ?>
                                        </li>
                                        <li>
                                            <strong><i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            </strong> <?= $contact->email; ?>
                                        </li>
                                        <li>
                                            <strong><i class="fa fa-phone" aria-hidden="true"></i>
											</strong> +91 <?= $contact->contact; ?>
                                        </li>
                                    </ul>
									<?php endforeach; ?>
									<?php } if(isset($_bank) && !empty($_bank)) { ?>
                                    <div class="row list-separated profile-stat accou-detail">
									<?php foreach($_bank as $bank) : ?>
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <div class="uppercase profile-stat-text"> Bank </div>
                                            <div class="uppercase profile-stat-title">
												<?= (!empty($bank->bank_name) ? $bank->bank_name : 'N/A'); ?>
											</div>
                                        </div>
										
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <div class="uppercase profile-stat-text"> Account No. </div>
                                            <div class="uppercase profile-stat-title">
												<?= (!empty($bank->account_no) ? $bank->account_no : 'N/A'); ?>
											</div>
                                        </div>
										
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <div class="uppercase profile-stat-text"> IFSC Code </div>
                                            <div class="uppercase profile-stat-title">
												<?= (!empty($bank->ifsc_code) ? $bank->ifsc_code : 'N/A'); ?>
											</div>
                                        </div>
										
                                        <div class="col-md-3 col-sm-4 col-xs-6">
                                            <div class="uppercase profile-stat-text"> Branch </div>
                                            <div class="uppercase profile-stat-title">
												<?= (!empty($bank->branch) ? $bank->branch : 'N/A'); ?>
											</div>
                                        </div>
									<?php endforeach; ?>
                                    </div>
									<?php } if(isset($supplier) && !empty($supplier->address)) { ?>
                                    <h4>Address</h4>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="thumbnail">
												<div class="caption">
                                                    <p><?= toProperCase($supplier->address); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<?php } if(isset($supplier) && !empty($supplier->note)) { ?>
									<h4>Note</h4>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="thumbnail">
												<div class="caption">
                                                    <p><?= toProperCase($supplier->note); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
									<?php } ?>
                                </div>
								
                            </div>
                        </div>