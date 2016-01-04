<?php
    $param = $this->param->getParams();
    
    $data = new My_Data();
    
    $mancc = $this->param->getParam("mancc");
    $ncc = new Model_Nhacungcap();
    $nccrow = $ncc->getWhere($mancc);
    
    //thông tin chung
    
    $title = array('Nhà Cung Cấp',"Số Điện Thoại","Địa Chỉ", "Fax", "Nợ", "Thanh Toán");
    
    $thanhtoan = 'Đã Trả Hết';
    if($nccrow['No'] > 0)
        $thanhtoan ='<button type="button" class="btn btn-success"><a class ="axem" href="'.HOST_PROJECT."/index/xem/nhacungcap/true/detail/true/tt/true/mancc/".$nccrow['MaNhaCungCap'].'/">Thanh Toán</a>';
    $content = array($nccrow['TenNhaCungCap'],$nccrow['DiaChi'],
            $nccrow['Fax'],$nccrow['Sdt'],($data->convertCurrency($nccrow['No'])),$thanhtoan);
    
    $query = $data->createRightTable($title, $content, "400px");
    //echo $query;
    ?>
    
    <div style ="height:350px !important">
            <div style='float: left'>
            <?php 
                echo '<h1 class="title">Thông Tin Chi Tiết</h1>';
                echo $query;
            ?>
            </div>
            
            <div class = "right">
            <?php 
                if(isset($param['tt']))
                {
                    $formtt = new Form_Formmoi_Thanhtoan();
                    if($this->param->isPost())
                    {
                        $ngaythanhtoan = $param['ngaythanhtoan'];
                        $tienthanhtoan = $param['tienthanhtoan'];
                        
                        $check = new Form_Valid_Thanhtoan($param,$nccrow['No']);
                        if($check->valid())
                        {
                            $mydate = Zend_Locale_Format::getDate($ngaythanhtoan,array("date_format"=>"dd.MM.yyyy"));
                            $date_str =  $mydate['year']."-". $mydate['month']."-". $mydate['day'];
                        
                            $hoadonncc = new Model_Hoadonncc();
                            $mydata = array(
                                    'MaHoaDon'=>null,
                                    'NgayThanhToan'=>$date_str,
                                    'SoTien'=>$tienthanhtoan,
                                    'MaNhaCungCap'=>$mancc
                            );
                            $hoadonncc->insert_hoadon($mydata);
                            $ncc->update_data($mancc, array('No'=>($nccrow['No'] - $tienthanhtoan)));
                            echo "<script>window.location.href='".HOST_PROJECT."/index/xem/nhacungcap/true/detail/true/mancc/".$mancc."';</script>";
                        }
                        else
                        {
                            $formtt->populate($param);
                            echo $formtt;
                        
                            echo "<div class='message'>";
                            foreach($check->messages as $item)
                            {
                                echo $item."<br/>";
                            }
                            echo "</div>";
                        }
                    }
                    else
                    {
                        echo $formtt;
                    }
                }
            ?>
            </div>
    </div>

    <?php 
        $hoadon = new Model_Hoadonncc();
        $hoadonall = $hoadon->getWhere_ncc($mancc);
    
        if($hoadonall)
        {
            echo '<h1 class="title">Lịch Sử Thanh Toán</h1>';
            
            $title = array("Mã Hóa Đơn","Ngày Thanh Toán","Số Tiền");
            $content= array();
            
            foreach ($hoadonall as $item)
            {
                $mydate = Zend_Locale_Format::getDate($item['NgayThanhToan'],array("date_format"=>"yyyy.MM.dd"));
                $date_str =  $mydate['day']."/".$mydate['month']."/".$mydate['year'] ;
                $tien = $data->convertCurrency($item['SoTien']);
                $sub = array($item['MaHoaDon'],$date_str,$tien);
                $content[] = $sub;
            }
            
            $query= $data->createTable($title, $content, "430px");
            echo $query;
        }
    ?>