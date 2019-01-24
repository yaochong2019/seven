<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:44:"./template/pc/jinghui/cart/ajax_address.html";i:1526563764;}*/ ?>


<?php if($address_list != 0): if(is_array($address_list) || $address_list instanceof \think\Collection || $address_list instanceof \think\Paginator): if( count($address_list)==0 ) : echo "" ;else: foreach($address_list as $k=>$v): if($v[is_default] == 1): ?> <!--默认选中的地址-->

    <tr class="address_current">

        <td class="select-address"><input type="radio" class="check-classic" data-province-id="<?php echo $v[province]; ?>" data-city-id="<?php echo $v[city]; ?>" data-district-id="<?php echo $v[district]; ?>" onclick="swidth_address(this);" name="address_id" value="<?php echo $v[address_id]; ?>" checked="checked"/></td>

        <td><?php echo $v[consignee]; ?></td>

        <td><?php echo $regionList[$v[province]]; ?> <?php echo $regionList[$v[city]]; ?> <?php echo $regionList[$v[district]]; ?></td>

        <td class="text-left"><?php echo $regionList[$v[twon]]; ?> <?php echo $v[address]; ?></td>

        <td><?php echo $v[mobile]; ?></td>

        <td>

            <a class="edit-address" title="编辑" style="cursor:pointer;" onclick="add_edit_address(<?php echo $v[address_id]; ?>);">

            <i class="iconfont icon-edit"></i> 编辑</a>

            <a class="delete-address" title="删除" style="cursor:pointer;" onclick="del_address(<?php echo $v[address_id]; ?>);"><i class="iconfont icon-delete">

            </i> 删除</a>

        </td>

        <td>

            <span>默认地址</span>

        </td>

    </tr>

<?php else: ?>

    <tr>

        <td class="select-address"><input type="radio" class="check-classic" data-province-id="<?php echo $v[province]; ?>" data-city-id="<?php echo $v[city]; ?>" data-district-id="<?php echo $v[district]; ?>" onclick="swidth_address(this);" name="address_id" value="<?php echo $v[address_id]; ?>" checked="checked"/></td>

        <td><?php echo $v[consignee]; ?></td>

        <td><?php echo $regionList[$v[province]]; ?> <?php echo $regionList[$v[city]]; ?> <?php echo $regionList[$v[district]]; ?></td>

        <td class="text-left"><?php echo $regionList[$v[twon]]; ?> <?php echo $v[address]; ?></td>

        <td><?php echo $v[mobile]; ?></td>

        <td>

            <a class="edit-address" title="编辑" style="cursor:pointer;" onclick="add_edit_address(<?php echo $v[address_id]; ?>);">

            <i class="iconfont icon-edit"></i> 编辑</a>

            <a class="delete-address" title="删除" style="cursor:pointer;" onclick="del_address(<?php echo $v[address_id]; ?>);"><i class="iconfont icon-delete">

            </i> 删除</a>

        </td>

        <td>

            <a class="set-default-address" >默认地址</a>

        </td>

    </tr>

<?php endif; endforeach; endif; else: echo "" ;endif; else: ?>

    <td></td><td></td><td></td><td style="color: red;">您还没有添加收货地址！</td><td></td><td></td><td></td>

<?php endif; ?>

<script type="text/javascript">$(":radio").labelauty({ label: false });</script>