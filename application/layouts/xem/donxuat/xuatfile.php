<?php

    $madonxuat = $this->param->getParam("madonxuat");
    $donxuat = new Model_Donxuat();
    $donxuatrow = $donxuat->getWhere($madonxuat);
    
     
    
    $pdf = new Framework_Pdf();
    $pdf->setPaperSize(2);
    //$pdf->setHeaderImage(getcwd() . '/' . $this->imageDir() . '/logo-main.png');
    
    $table = $pdf->addTable(array('align'=>'justify', 'no_wrap' => True));
    $table->addSpacerRow();
    $table->addRow(array('underline' => True))
    ->addCol("Some Header", array('bold' => true, 'colspan' => 3, 'align' => 'center'));
    $table->addRow()
    ->addCol("Column Text 1", array('bold' => true, 'align' => 'center', 'colspan'=>3))
    ->addCol(" ")
    ->addCol("Column Text 2", array('bold' => true, 'align' => 'center', 'colspan'=>3));
    
    $pdf->addPage();
    $table = $pdf->addTable(array('align'=>'justify', 'no_wrap' => True));
    // Per popular request, an example of adding columns using a loop
    $row = $table->addRow();
    
    for($i = 0; $i < 10; $i++) {
        $row->addCol("Some Info");
    }
    
    $pdf->build("C:\\Users\\ThucLB\\Desktop\\xuatfile.pdf");
    
    
    
    
    
    
    
    
    
    