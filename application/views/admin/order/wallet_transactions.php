<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo $title; ?></h3>
    </div><!-- /.box-header -->

    <div class="box-body">
        <div class="row">
            <!-- include message block -->
            <div class="col-sm-12">
                <?php $this->load->view('admin/includes/_messages'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" role="grid">
                        <?php $this->load->view('admin/order/_filter_w_transactions'); ?>
                        <thead>
                        <tr role="row">
                            <th><?php echo trans('id'); ?></th>
                            <th><?php echo trans('user_email'); ?></th>
                            <th><?php echo trans('paid_wallet_amount'); ?></th>
                            <th><?php echo trans('date_time'); ?></th>                            
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($w_transactions as $item): ?>
                            <tr>
                                <td><?php echo $item->id; ?></td>
                                <td class="order-number-table">
                                    <?php
                                    $user_email = $item->user_email;
                                    if (!empty($user_email)):
                                        echo $user_email;
                                    endif; ?>
                                </td>
                                <td>
                                    <?php
                                    $paid_amount = $item->paid_amount;
                                    if (!empty($paid_amount)):
                                        echo $paid_amount;
                                    endif; ?>
                                </td>
                                <td>
                                    <?php
                                    $paid_at = $item->paid_at;
                                    if (!empty($paid_at)):
                                        echo $paid_at;
                                    endif; ?>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>

                    <?php if (empty($w_transactions)): ?>
                        <p class="text-center">
                            <?php echo trans("no_records_found"); ?>
                        </p>
                    <?php endif; ?>
                    <div class="col-sm-12 table-ft">
                        <div class="row">
                            <div class="pull-right">
                                <?php echo $this->pagination->create_links(); ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>
