<?php

namespace app\common\model;
use phpmailer\PHPExcel;
use think\Model;

class Api extends Model
{
    public function jsonReturn($data)
    {
        $return = array(
                    'status' => 200,    /* 返回状态，200 成功，500失败 */
                    'data' => $data,
                    'message' => '成功',
                    );
        return json_encode($return,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
    }

    public function success($message)
    {
        $return = array(
                    'status' => 200,    /* 返回状态，200 成功，500失败 */
                    'message' => $message,
                    );
        return json_encode($return,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
    }

    public function error($message)
    {
        $return = array(
                    'status' => 500,    /* 返回状态，200 成功，500失败 */
                    'message' => $message,
                    );
        return json_encode($return,JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES);
    }

    function exportExcel($expTitle, $expCellName, $expTableData, $setTitle)
    {
        ini_set('memory_limit', '-1');//取消内存限制
        set_time_limit(0);//无时间限制可以一直执行到结束
        $xlsTitle = iconv('utf-8', 'gbk', $expTitle);//文件名称
        $fileName = $xlsTitle;//or $xlsTitle 文件名称可根据自己情况设定
        $cellNum = count($expCellName);
        $dataNum = count($expTableData);
        $objPHPExcel = new \PHPExcel();
        //设置工作表格名称
        $objPHPExcel->getActiveSheet()->setTitle($setTitle);

        $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');

        for ($i = 0; $i < $cellNum; $i++) {
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i] . '1', $expCellName[$i][1]);
        }
        // Miscellaneous glyphs, UTF-8
        for ($i = 0; $i < $dataNum; $i++) {
            for ($j = 0; $j < $cellNum; $j++) {
                $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j] . ($i + 2), $expTableData[$i][$expCellName[$j][0]]);
            }
        }

        // MIME 协议，文件的类型，不设置，会默认html
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        // MIME 协议的扩展
        header('Content-Disposition:attachment;filename="'.$fileName.'.xlsx"');
        // 缓存控制
        header('Cache-Control:max-age=0');

        $writer = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        // php://output 它是一个只写数据流, 允许你以 print 和 echo一样的方式写入到输出缓冲区。
        $writer->save('php://output');
        exit;
    }
}