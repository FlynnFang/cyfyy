/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50624
 Source Host           : localhost
 Source Database       : xxgjb

 Target Server Type    : MySQL
 Target Server Version : 50624
 File Encoding         : utf-8

 Date: 01/25/2016 08:51:02 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `JCXX`
-- ----------------------------
DROP TABLE IF EXISTS `JCXX`;
CREATE TABLE `JCXX` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `CODE` varchar(32) NOT NULL COMMENT '受试者编号',
  `HOSPITAL` varchar(32) NOT NULL COMMENT '归属医院',
  `ZJLX` varchar(4) NOT NULL COMMENT '证件类型',
  `ZJHM` varchar(255) NOT NULL COMMENT '证件号码',
  `ZYH` varchar(255) NOT NULL COMMENT '住院号',
  `RYSJ` varchar(16) NOT NULL COMMENT '入院时间',
  `CYSJ` varchar(16) NOT NULL COMMENT '出院时间',
  `SFRQ` varchar(16) NOT NULL COMMENT '随访日期',
  `SEX` varchar(4) NOT NULL COMMENT '性别',
  `AGE` varchar(4) NOT NULL COMMENT '年龄',
  `HEIGHT` varchar(4) NOT NULL COMMENT '身高',
  `WEIGHT` varchar(4) NOT NULL COMMENT '体重',
  `BMI` varchar(16) NOT NULL COMMENT 'BMI',
  `TEL1` varchar(16) NOT NULL COMMENT '联系电话1',
  `TEL2` varchar(16) NOT NULL COMMENT '联系电话2',
  `HOME_ADDR` varchar(500) NOT NULL COMMENT '家庭住址',
  `COMPANY_ADDR` varchar(500) NOT NULL COMMENT '工作单位',
  `XL` varchar(4) NOT NULL COMMENT '学历',
  `CREATE_TIME` int(11) NOT NULL COMMENT '记录时间',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='基础信息';

-- ----------------------------
--  Table structure for `DBZ`
-- ----------------------------
DROP TABLE IF EXISTS `DBZ`;
CREATE TABLE `DBZ` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `CODE` varchar(32) NOT NULL COMMENT '病人CODE',
  `XS_BY_OPTION` varchar(4) NOT NULL COMMENT '心衰 病因 高血压  心脏瓣膜病  扩心病 冠心病 其他（   ）（单选） ',
  `XS_BY_QT` varchar(255) NOT NULL COMMENT '其他（   ）',
  `XS_LX_OPTION` varchar(4) NOT NULL COMMENT '类型：收缩型 舒张型  （单选',
  `XS_OPTION` varchar(4) NOT NULL COMMENT '左心衰 右心衰 全心衰 （单选',
  `XS_XGN_OPTION` varchar(4) NOT NULL COMMENT '4、心功能 （I II III IV)',
  `XS_YWSY_LNJ_OPTION` varchar(4) NOT NULL COMMENT '药物使用（出院） 利尿剂         是   否',
  `XS_YWSY_B_OPTION` varchar(4) NOT NULL COMMENT 'B受体阻滞剂    是   否',
  `XS_YWSY_ACEI_OPTION` varchar(4) NOT NULL COMMENT 'ACEI/AEB      是   否',
  `XS_YWSY_LNZ_OPTION` varchar(4) NOT NULL COMMENT '螺内酯        是    否',
  `XS_YWSY_DGX_OPTION` varchar(4) NOT NULL COMMENT '地高辛        是    否',
  `XS_YWSY_GLZJKJ_OPTION` varchar(4) NOT NULL COMMENT '钙离子拮抗剂  是    否',
  `XG_KILLIP_OPTION` varchar(4) NOT NULL COMMENT 'killip分级	单选（I，II，III，IV）',
  `XG_BW` varchar(255) NOT NULL COMMENT '心梗部位 不定项选择           前间壁           前壁           广泛前壁           高侧壁           下壁           右室           正后壁',
  `XG_LX` varchar(4) NOT NULL COMMENT '类型 ST段抬高心肌梗死 非ST段抬高心肌梗死',
  `XG_SFJZJRZL_OPTION` varchar(4) NOT NULL COMMENT '是否急诊介入治疗                是              否',
  `XG_MZSJ` varchar(11) NOT NULL COMMENT '如是，门-球时间（  ）分钟，',
  `XG_FMC` varchar(11) NOT NULL COMMENT '首次医疗接触时间（FMC）时间（  ）分钟',
  `XG_SS_LM_CD` varchar(255) NOT NULL COMMENT ' LM 左主干',
  `XG_SS_LM_ZJLX` varchar(255) NOT NULL COMMENT ' LM 左主干',
  `XG_SS_LM_DX` varchar(255) NOT NULL COMMENT ' LM 左主干',
  `XG_SS_LAD_CD` varchar(255) NOT NULL COMMENT ' LAD 前降支',
  `XG_SS_LAD_ZJLX` varchar(255) NOT NULL COMMENT ' LAD 前降支',
  `XG_SS_LAD_DX` varchar(255) NOT NULL COMMENT ' LAD 前降支',
  `XG_SS_RCA_CD` varchar(255) NOT NULL COMMENT ' RCA 右冠',
  `XG_SS_RCA_ZJLX` varchar(255) NOT NULL COMMENT ' RCA 右冠',
  `XG_SS_RCA_DX` varchar(255) NOT NULL COMMENT ' RCA 右冠',
  `XG_SS_LCX_CD` varchar(255) NOT NULL COMMENT ' LCX 回旋支',
  `XG_SS_LCX_ZJLX` varchar(255) NOT NULL COMMENT ' LCX 回旋支',
  `XG_SS_LCX_DX` varchar(255) NOT NULL COMMENT ' LCX 回旋支',
  `XG_SS_DIA_CD` varchar(255) NOT NULL COMMENT ' Dia 对角支',
  `XG_SS_DIA_ZJLX` varchar(255) NOT NULL COMMENT ' Dia 对角支',
  `XG_SS_DIA_DX` varchar(255) NOT NULL COMMENT ' Dia 对角支',
  `XG_SS_OM_CD` varchar(255) NOT NULL COMMENT ' OM 钝缘支',
  `XG_SS_OM_ZJLX` varchar(255) NOT NULL COMMENT ' OM 钝缘支',
  `XG_SS_OM_DX` varchar(255) NOT NULL COMMENT ' OM 钝缘支',
  `XG_SS_PDA_CD` varchar(255) NOT NULL COMMENT ' PDA 后降支',
  `XG_SS_PDA_ZJLX` varchar(255) NOT NULL COMMENT ' PDA 后降支',
  `XG_SS_PDA_DX` varchar(255) NOT NULL COMMENT ' PDA 后降支',
  `XG_SS_PLA_CD` varchar(255) NOT NULL COMMENT ' PLA 左室后支',
  `XG_SS_PLA_ZJLX` varchar(255) NOT NULL COMMENT ' PLA 左室后支',
  `XG_SS_PLA_DX` varchar(255) NOT NULL COMMENT ' PLA 左室后支',
  `XG_SS_QT_TEXT` varchar(255) NOT NULL COMMENT '其他 （输入）',
  `XG_SS_QT_CD` varchar(255) NOT NULL COMMENT '其他 （输入）',
  `XG_SS_QT_ZJLX` varchar(255) NOT NULL COMMENT '其他 （输入）',
  `XG_SS_QT_DX` varchar(255) NOT NULL COMMENT '其他 （输入）',
  `SP_LX_OPTION` varchar(4) NOT NULL COMMENT '类型：室上速     房颤（房扑）   室早     室速',
  `SP_SSSJ` varchar(32) NOT NULL COMMENT '手术时间',
  `SP_SSFF_OPTION` varchar(4) NOT NULL COMMENT '随访复发（是-否）',
  `SP_YYWC_OPTION` varchar(4) NOT NULL COMMENT '用药维持（是    否）        ',
  `SP_YYWC_YW` varchar(255) NOT NULL COMMENT '药物   ',
  `QBQ_ZRYY_OPTION` varchar(4) NOT NULL COMMENT '植入起搏器原因：1、病态窦房结综合征 2、房室传导阻滞  3、室速           4、心衰',
  `QBQ_LX_OPTION` varchar(4) NOT NULL COMMENT '起搏器类型：1、单腔起搏器 2、双腔起搏器  3、ICD    4、CRT(D)',
  `QBQ_SSSJ` varchar(32) NOT NULL COMMENT '手术时间：',
  `QBQ_CQSFYY` varchar(255) NOT NULL COMMENT '长期随访用药： ',
  `QBQ_XLSCYY` varchar(255) NOT NULL COMMENT '心律失常的用药',
  `QBQ_SFQJ_YJFZ_OPTION` varchar(4) NOT NULL COMMENT '随访期间：    是否有黑矇、晕厥发作    （是    否）',
  `QBQ_SFQJ_ICD_OPTION` varchar(4) NOT NULL COMMENT ' 如是ICD 是否有放电      （是   否）',
  `QBQ_SFQJ_GNYC_OPTION` varchar(4) NOT NULL COMMENT '  起搏器功能异常 （是  否）',
  `QBQ_SFQJ_SFGZ_OPTION` varchar(4) NOT NULL COMMENT '（感知  起搏）异常',
  `CREATE_TIME` int(11) NOT NULL COMMENT '记录创建时间',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='单病种';

-- ----------------------------
--  Table structure for `JWBS`
-- ----------------------------
DROP TABLE IF EXISTS `JWBS`;
CREATE TABLE `JWBS` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `CODE` varchar(32) NOT NULL COMMENT '病人CODE',
  `XYS_OPTION` varchar(4) NOT NULL COMMENT '吸烟史',
  `XYS_N` varchar(4) NOT NULL COMMENT '吸烟史：      年  ',
  `XYS_ZT` varchar(4) NOT NULL COMMENT ' 吸烟量：          支/天',
  `YJS_OPTION` varchar(4) NOT NULL COMMENT '饮酒史：',
  `YJS_N` varchar(4) NOT NULL COMMENT '饮酒史：      年  ',
  `YJS_PT` varchar(4) NOT NULL COMMENT ' 饮酒量：          支/天',
  `YJSFDH_OPTION` varchar(4) NOT NULL COMMENT '夜间是否打鼾：',
  `GXY_OPTION` varchar(4) NOT NULL COMMENT '高血压：',
  `GXY_HBNS` varchar(4) NOT NULL COMMENT '、患病年数：          年   ',
  `GXY_ZL_OPTION` varchar(4) NOT NULL COMMENT '治疗  （是    否）',
  `GXY_ZLYW` varchar(255) NOT NULL COMMENT '治疗药物',
  `TLB_OPTION` varchar(4) NOT NULL COMMENT '糖尿病：',
  `TLB_HBNS` varchar(4) NOT NULL COMMENT '患病年数：          年',
  `TLB_ZL_OPTION` varchar(4) NOT NULL COMMENT '治疗 （是    否）    ',
  `TLB_ZLYW` varchar(255) NOT NULL COMMENT '治疗药物',
  `ZDXWL_OPTION` varchar(4) NOT NULL COMMENT '脂代谢紊乱：',
  `ZDXWL_LX` varchar(4) NOT NULL COMMENT '紊乱类型：胆固醇高 甘油三酯高 两样都高 不详 ',
  `ZDXWL_HBN` varchar(4) NOT NULL COMMENT '、患病：         年            ',
  `ZDXWL_ZL_OPTION` varchar(4) NOT NULL COMMENT '、治疗： 是   否   ',
  `ZDXWL_YW` varchar(255) NOT NULL COMMENT '药物',
  `FC_OPTION` varchar(4) NOT NULL COMMENT '房颤：',
  `FC_HBN` varchar(4) NOT NULL COMMENT '患病：         年           ',
  `FC_ZL_OPTION` varchar(4) NOT NULL COMMENT '治疗： 是   否',
  `FC_YW` varchar(255) NOT NULL COMMENT '药物：',
  `DZXNQXFZ_OPTION` varchar(4) NOT NULL COMMENT '短暂性脑缺血发作：',
  `ZZ_OPTION` varchar(4) NOT NULL COMMENT '卒中',
  `ZZ_LX` varchar(4) NOT NULL COMMENT '类型：脑出血 脑梗死 不详',
  `WZXGB_OPTION` varchar(4) NOT NULL COMMENT '外周血管病：',
  `XJGS_OPTION` varchar(4) NOT NULL COMMENT '心肌梗死：',
  `MXSGNBQ_OPTION` varchar(4) NOT NULL COMMENT '慢性肾功能不全：',
  `MXZSXFBJB_OPTION` varchar(4) NOT NULL COMMENT '慢性阻塞性肺部疾病：',
  `XHDCX_OPTION` varchar(4) NOT NULL COMMENT '消化道出血：',
  `XLSJ_OPTION` varchar(4) NOT NULL COMMENT '心力衰竭：',
  `JWGMJRZL_OPTION` varchar(4) NOT NULL COMMENT '既往冠脉介入治疗：',
  `JWGMJRZL_BW` varchar(4) NOT NULL COMMENT '部位 下拉框选择',
  `JWGMDQZL_OPTION` varchar(4) NOT NULL COMMENT '既往冠脉搭桥治疗：',
  `CREATE_TIME` int(11) NOT NULL COMMENT '记录时间',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='既往病史';

-- ----------------------------
--  Table structure for `SFZDSJ`
-- ----------------------------
DROP TABLE IF EXISTS `SFZDSJ`;
CREATE TABLE `SFZDSJ` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `CODE` varchar(32) NOT NULL COMMENT '病人CODE',
  `SW_OPTION` varchar(4) NOT NULL COMMENT '死亡（随访过程中发生）',
  `SW_YY_OPTION` varchar(4) NOT NULL COMMENT '心源性 非心源性',
  `ZZ_OPTION` varchar(4) NOT NULL COMMENT '卒中/栓塞（随访过程中发生）',
  `ZZ_YY_OPTION` varchar(4) NOT NULL COMMENT '脑梗塞  脑出血',
  `XS_OPTION` varchar(4) NOT NULL COMMENT '心衰（随访过程中发生）',
  `CX_OPTION` varchar(4) NOT NULL COMMENT '出血（随访过程中发生）',
  `CX_LX_OPTION` varchar(4) NOT NULL COMMENT '1、类型：大出血 小出血  （单选）',
  `CX_BW` varchar(255) NOT NULL COMMENT '2、部位',
  `CX_SFSX_OPTION` varchar(4) NOT NULL COMMENT '处理（输血）：是 否  （单选） ',
  `XJGS_OPTION` varchar(4) NOT NULL COMMENT '心肌梗死（随访过程中发生）',
  `ZZY_OPTION` varchar(4) NOT NULL COMMENT '再住院（随访过程中发生）',
  `ZZY_ZYCS` varchar(255) NOT NULL COMMENT '住院次数',
  `XLSC_OPTION` varchar(4) NOT NULL COMMENT '心律失常（随访过程中发生）',
  `CREATE_TIME` int(11) NOT NULL COMMENT '记录创建日期',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='随访终点事件';

-- ----------------------------
--  Table structure for `SYSJC`
-- ----------------------------
DROP TABLE IF EXISTS `SYSJC`;
CREATE TABLE `SYSJC` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `CODE` varchar(32) NOT NULL COMMENT '病人CODE',
  `XCG_XX` varchar(4) NOT NULL COMMENT '血型',
  `XCG_WBC` varchar(255) NOT NULL COMMENT '白细胞计数（WBC）：',
  `XCG_NEUT` varchar(255) NOT NULL COMMENT '其中中性粒细胞（NEUT%）：',
  `XCG_HGB` varchar(255) NOT NULL COMMENT '血红蛋白(HGB)：',
  `XCG_LYM` varchar(255) NOT NULL COMMENT '淋巴细胞比例(LYM%)',
  `XCG_PLT` varchar(255) NOT NULL COMMENT '血小板(PLT)：',
  `XCG_HCT` varchar(255) NOT NULL COMMENT '红细胞压积(HCT)：',
  `XSH_CRP` varchar(255) NOT NULL COMMENT 'CRP（单位Mg/L）：',
  `XSH_AST` varchar(255) NOT NULL COMMENT '谷草转氨酶（AST）：',
  `XSH_ALT` varchar(255) NOT NULL COMMENT '谷丙转氨酶（ALT）：',
  `XSH_TBIL` varchar(255) NOT NULL COMMENT '总胆红素（TBIL）：',
  `XSH_DBIL` varchar(255) NOT NULL COMMENT '直接胆红素（DBIL）：',
  `XSH_UA` varchar(255) NOT NULL COMMENT '尿酸（UA）：',
  `XSH_BUN` varchar(255) NOT NULL COMMENT '尿素氮（BUN）：',
  `XSH_CR` varchar(255) NOT NULL COMMENT '肌酐（Cr）：',
  `XSH_GYS` varchar(255) NOT NULL COMMENT '胱抑素',
  `XSH_TG` varchar(255) NOT NULL COMMENT '甘油三脂（TG）：',
  `XSH_HDLC` varchar(255) NOT NULL COMMENT '高密度脂蛋白（HDLC）：',
  `XSH_LDLC` varchar(255) NOT NULL COMMENT '低密度脂蛋白（LDLC）：',
  `XSH_ZDGC` varchar(255) NOT NULL COMMENT '总胆固醇：',
  `QTSHZB_ALB` varchar(255) NOT NULL COMMENT '白蛋白（Alb）：',
  `QTSHZB_THXHDB` varchar(255) NOT NULL COMMENT '糖化血红蛋白：',
  `QTSHZB_XT` varchar(255) NOT NULL COMMENT '血糖',
  `QTSHZB_DEJT` varchar(255) NOT NULL COMMENT 'D-二聚体',
  `QTSHZB_FDP` varchar(255) NOT NULL COMMENT '纤维蛋白降解产物（FDP）',
  `QTSHZB_XC` varchar(255) NOT NULL COMMENT '血沉',
  `DJZ_K` varchar(255) NOT NULL COMMENT 'K+',
  `DJZ_NA` varchar(255) NOT NULL COMMENT 'Na+',
  `JG_FT3` varchar(255) NOT NULL COMMENT '游离T3（FT3）：',
  `JG_TT3` varchar(255) NOT NULL COMMENT '血清总三碘甲状原氨酸（TT3）',
  `JG_TSH` varchar(255) NOT NULL COMMENT '促甲状腺激素（TSH）：',
  `N_NWLBDB` varchar(255) NOT NULL COMMENT '尿微量白蛋白',
  `N_NDB` varchar(255) NOT NULL COMMENT '尿蛋白/肌酐比值',
  `DBYX_DBYXSFYX` varchar(255) NOT NULL COMMENT '大便隐血是否阳性',
  `XJSSBZW_CKMB` varchar(255) NOT NULL COMMENT 'CK-MB',
  `XJSSBZW_TNT` varchar(255) NOT NULL COMMENT 'TnT',
  `XJSSBZW_TNI` varchar(255) NOT NULL COMMENT 'TnI',
  `XSZB_BNP` varchar(255) NOT NULL COMMENT '脑钠肽前体（Pro-BNP）',
  `XZCC_LVEF` varchar(255) NOT NULL COMMENT 'LVEF值：',
  `XZCC_ZSSZMNJZ` varchar(255) NOT NULL COMMENT '左室舒张末内径值：',
  `XZCC_YS` varchar(255) NOT NULL COMMENT '右室：',
  `XZCC_ZF` varchar(255) NOT NULL COMMENT '左房：',
  `XZCC_YF` varchar(255) NOT NULL COMMENT '右房：',
  `XZCC_FS` varchar(255) NOT NULL COMMENT '左室短轴缩短率（FS）:',
  `XZCC_FDMSSY` varchar(255) NOT NULL COMMENT '肺动脉收缩压：',
  `CREATE_TIME` int(11) NOT NULL COMMENT '记录创建时间',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `YWS`
-- ----------------------------
DROP TABLE IF EXISTS `YWS`;
CREATE TABLE `YWS` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `CODE` varchar(32) NOT NULL COMMENT '病人CODE',
  `ASPL_JWFY_OPTION` varchar(4) NOT NULL COMMENT '阿司匹林 既往服用',
  `ASPL_ZYQJ_OPTION` varchar(4) NOT NULL COMMENT '阿司匹林 住院期间',
  `ASPL_ZYQJ_WCL` varchar(8) NOT NULL COMMENT '阿司匹林 维持量：   mg/d ',
  `ASPL_ZYQJ_WYHTYYY` varchar(255) NOT NULL COMMENT '阿司匹林 未用或停药原因（多选）： 1、既往有出血病史（包括脑、消化道或皮肤出血病史） 2、出现出血并发症 3、过敏 4、胃肠道不适 5、准备外科搭桥手术 6、其他不良反应 7、不明 8、不适用',
  `ASPL_ZYQJ_HYTY_FY` varchar(8) NOT NULL COMMENT '阿司匹林 用后又停 服药：        天    ',
  `ASPL_ZYQJ_HYTY_YY` varchar(255) NOT NULL COMMENT '阿司匹林 未用或停药原因（多选）： 1、既往有出血病史（包括脑、消化道或皮肤出血病史） 2、出现出血并发症 3、过敏 4、胃肠道不适 5、准备外科搭桥手术 6、其他不良反应 7、不明 8、不适用',
  `LBGL_JWFY_OPTION` varchar(4) NOT NULL COMMENT '氯吡格雷 既往服用',
  `LBGL_ZYQJ_OPTION` varchar(4) NOT NULL COMMENT '住院期间 是 否 用后停用',
  `LBGL_ZYQJ_WCL` varchar(8) NOT NULL COMMENT '维持量：   mg/d      ',
  `LBGL_ZYQJ_WYHTYYY` varchar(255) NOT NULL COMMENT '未用或停药原因（多选）： 1、既往有出血病史（包括脑、消化道或皮肤出血病史） 2、出现出血并发症 3、过敏 4、胃肠道不适 5、准备外科搭桥手术 6、其他不良反应 7、不明 8、不适用    ',
  `LBGL_ZYQJ_HYTY_FY` varchar(8) NOT NULL COMMENT '服药：        天   ',
  `LBGL_ZYQJ_HYTY_YY` varchar(255) NOT NULL COMMENT '未用或停药原因（多选）： 1、既往有出血病史（包括脑、消化道或皮肤出血病史） 2、出现出血并发症 3、过敏 4、胃肠道不适 5、准备外科搭桥手术 6、其他不良反应 7、不明 8、不适用',
  `ZSYKNYW_OPTION` varchar(4) NOT NULL COMMENT '注射用抗凝药物 是 否',
  `ZSYKNYW_YWMC` varchar(255) NOT NULL COMMENT '1、药物名称（多选）：普通肝素 低分子肝素 磺达肝葵钠 其他',
  `ZSYKNYW_JL` varchar(255) NOT NULL COMMENT '2、剂量： 全量  半量  半量-全量之间（普通肝素、若按apTT调整的，为全量）',
  `ZSYKNYW_YYCXSJ` varchar(8) NOT NULL COMMENT '3、应用持续时间：         天',
  `KFKNY_JWFY_OPTION` varchar(4) NOT NULL COMMENT '口服抗凝药 既往服用 是-否-不详',
  `KFKNY_ZYQJ_OPTION` varchar(4) NOT NULL COMMENT '住院期间 是 否 如用华法林，INR值',
  `KFKNY_ZYQJ_YWZL` varchar(255) NOT NULL COMMENT '1、药物种类（多选）：  华法林   Xa因子抑制剂（沙班类）  其他',
  `KFKNY_ZYQJ_ZZ` varchar(255) NOT NULL COMMENT '2、指征（多选）：  房颤 左室血栓 肺血栓 阿司匹林过敏替代 换瓣术后 深静脉血栓                   其他',
  `KFKNY_ZYQJ_INR` varchar(8) NOT NULL COMMENT '如用华法林，INR值',
  `TTLYW_OPTION` varchar(4) NOT NULL COMMENT '他汀类药物 是 否',
  `TTLYW_FHYW` varchar(255) NOT NULL COMMENT '1、负荷药物： 辛伐他汀  阿托伐他汀  普伐他汀  洛伐他汀  氟伐他汀  匹伐他汀  瑞舒伐他汀  血脂康  不适用',
  `TTLYW_WCL` varchar(8) NOT NULL COMMENT '2、维持剂量：       mg/d',
  `JYYW_OPTION` varchar(255) NOT NULL COMMENT '降压药物 CCB   ARB   ACEI   β受体阻滞剂   利尿剂',
  `QT_XSZLYW_JWFY_OPTION` varchar(4) NOT NULL COMMENT '其他 硝酸酯类药物 既往服用 是否',
  `QT_XSZLYW_ZYQJ_OPTION` varchar(4) NOT NULL COMMENT '硝酸酯类药物 住院期间 是  否  ',
  `QT_XSZLYW_MC` varchar(255) NOT NULL COMMENT '名称',
  `QT_KXLSCYW_JWFY_OPTION` varchar(4) NOT NULL COMMENT '抗心律失常药物 既往服用',
  `QT_KXLSCYW_ZYQJ_OPTION` varchar(4) NOT NULL COMMENT '抗心律失常药物  住院期间',
  `QT_KXLSCYW_MC` varchar(255) NOT NULL COMMENT '抗心律失常药物  种类',
  `QT_QGTJKJ_JWFY_OPTION` varchar(4) NOT NULL COMMENT '醛固酮拮抗剂 既往服用',
  `QT_QGTJKJ_ZYQJ_OPTION` varchar(4) NOT NULL COMMENT '醛固酮拮抗剂 住院期间',
  `QT_QGTJKJ_MC` varchar(255) NOT NULL COMMENT '醛固酮拮抗剂 种类',
  `QT_LLJ_JWFY_OPTION` varchar(4) NOT NULL COMMENT '利尿剂 既往服用',
  `QT_LLJ_ZYQJ_OPTION` varchar(4) NOT NULL COMMENT '利尿剂 住院期间',
  `QT_LLJ__MC` varchar(255) NOT NULL COMMENT '利尿剂 种类',
  `QT_WSYZJ_JWFY_OPTION` varchar(4) NOT NULL COMMENT '胃酸抑制剂 既往服用',
  `QT_WSYZJ_ZYQJ_OPTION` varchar(4) NOT NULL COMMENT '胃酸抑制剂  住院期间',
  `QT_WSYZJ_MC` varchar(255) NOT NULL COMMENT '胃酸抑制剂 种类',
  `CREATE_TIME` int(11) NOT NULL COMMENT '记录创建时间',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `ZYQK`
-- ----------------------------
DROP TABLE IF EXISTS `ZYQK`;
CREATE TABLE `ZYQK` (
  `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `CODE` varchar(32) NOT NULL COMMENT '病人CODE',
  `RYTZ_XY_SSY` varchar(16) NOT NULL COMMENT '收缩压',
  `RYTZ_XY_SZY` varchar(16) NOT NULL COMMENT '舒张压',
  `RYTZ_XL_JXXL` varchar(4) NOT NULL COMMENT '静息心率',
  `RYTZ_XL_FC_OPTION` varchar(4) NOT NULL COMMENT '是否是房颤       是               否',
  `CYZT_OPTION` varchar(4) NOT NULL COMMENT '出院状态：存活  死亡',
  `ZYTS` varchar(8) NOT NULL COMMENT '住院天数：',
  `CYZD_OPTION` varchar(4) NOT NULL COMMENT '出院诊断：1、稳定型心绞痛          7、扩张性心肌病 2、不稳定型心绞痛        8、其他（填）    3、非ST段抬高型心肌梗死 4、ST段抬高型心肌梗死 5、高血压病 6、风湿性心脏病',
  `CYZD_QT` varchar(255) NOT NULL COMMENT '其他（填）',
  `CYDY_OPTION` varchar(255) NOT NULL COMMENT '出院带药：1、阿司匹林                                          2、氯吡格雷                                                  3、β受体阻滞剂                                        4、硝酸酯                                                 5、他汀类                                                        6、ACEI                                                        7、ARB                                            8、抗心律失常药物                                    9、CCB                                           10、地高辛                                     11、利尿剂                                       12、中成药                                          13、法华林',
  `CYDY_MC` varchar(255) NOT NULL COMMENT '名称',
  `CYDY_YF` varchar(500) NOT NULL COMMENT ' 用法',
  `CYDY_SFQJYWBH` varchar(500) NOT NULL COMMENT '随访期间的药物变化',
  `CREATE_TIME` int(11) NOT NULL COMMENT '记录创建时间',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='住院情况';

-- ----------------------------
--  Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `username` varchar(16) NOT NULL COMMENT '用户名',
  `password` varchar(64) NOT NULL COMMENT '密码',
  `hospital` varchar(4) NOT NULL COMMENT '所属医院',
  `role` varchar(4) NOT NULL COMMENT '角色',
  `create_time` int(11) NOT NULL COMMENT '创建时间',
  `parent_id` int(11) NOT NULL COMMENT '创建者ID',
  `last_login_time` int(11) NOT NULL COMMENT '最近一次登录时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
--  Records of `admin`
-- ----------------------------
BEGIN;
INSERT INTO `admin` VALUES ('1', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1', '0', '0', '0', '1453459444'), ('4', 'herbre', 'e10adc3949ba59abbe56e057f20f883e', '2', '1', '1437401873', '0', '1437791124');
COMMIT;

-- ----------------------------
--  Table structure for `config`
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `type` varchar(50) NOT NULL COMMENT '类型',
  `c_key` varchar(4) NOT NULL COMMENT '配置项关键字',
  `c_value` text NOT NULL COMMENT '配置项值',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8 COMMENT='配置信息表 ';

-- ----------------------------
--  Records of `config`
-- ----------------------------
BEGIN;
INSERT INTO `config` VALUES ('1', 'role', '0', '超级管理员'), ('2', 'role', '1', '主任'), ('3', 'role', '2', '医生'), ('4', 'ZJLX', '1', '身份证'), ('5', 'ZJLX', '2', '学生证'), ('6', 'ZJLX', '3', '工作证'), ('7', 'ZJLX', '4', '士兵证'), ('8', 'ZJLX', '5', '军官证'), ('9', 'ZJLX', '6', '护照'), ('10', 'XL', '1', '博士研究生'), ('11', 'XL', '2', '硕士研究生'), ('12', 'XL', '3', '本科'), ('13', 'XL', '4', '专科'), ('14', 'XL', '5', '高职'), ('15', 'XL', '6', '中专'), ('16', 'XL', '7', '高中'), ('17', 'XL', '8', '初中'), ('18', 'XL', '9', '小学'), ('19', 'XYS', '1', '吸烟'), ('20', 'XYS', '2', '不吸烟'), ('21', 'YJS', '1', '经常饮酒'), ('22', 'YJS', '2', '偶尔饮酒'), ('23', 'YJS', '3', '从不饮酒'), ('24', 'WLLX', '1', '胆固醇高'), ('25', 'WLLX', '2', '甘油三酯高'), ('26', 'WLLX', '3', '两样都高'), ('27', 'WLLX', '4', '不详'), ('28', 'ZZLX', '1', '脑出血'), ('29', 'ZZLX', '2', '脑梗死'), ('30', 'ZZLX', '3', '不详'), ('31', 'TYYY', '1', '既往有出血病史（包括脑、消化道或皮肤出血病史）'), ('32', 'TYYY', '2', '出现出血并发症'), ('33', 'TYYY', '3', '过敏'), ('34', 'TYYY', '4', '胃肠道不适'), ('35', 'TYYY', '5', '准备外科搭桥手术'), ('36', 'TYYY', '6', '其他不良反应'), ('37', 'TYYY', '7', '不明'), ('38', 'TYYY', '8', '不适用'), ('39', 'ZSYKNY', '1', '普通肝素'), ('40', 'ZSYKNY', '2', '低分子肝素'), ('41', 'ZSYKNY', '3', '磺达肝葵钠'), ('42', 'ZSYKNY', '4', '其他'), ('43', 'ZSYKNY_JL', '1', '全量'), ('44', 'ZSYKNY_JL', '2', '半量'), ('45', 'ZSYKNY_JL', '3', '半量-全量之间（普通肝素、若按apTT调整的，为全量）'), ('46', 'KFKNY', '1', '华法林'), ('47', 'KFKNY', '2', 'Xa因子抑制剂（沙班类）'), ('48', 'KFKNY', '3', '其他'), ('49', 'KFKNYZZ', '1', '房颤'), ('50', 'KFKNYZZ', '2', '左室血栓'), ('51', 'KFKNYZZ', '1', '肺血栓'), ('52', 'KFKNYZZ', '2', '阿司匹林过敏替代'), ('53', 'KFKNYZZ', '3', '换瓣术后'), ('54', 'KFKNYZZ', '4', '深静脉血栓'), ('55', 'KFKNYZZ', '5', '其他'), ('56', 'TTLYY', '1', '辛伐他汀'), ('57', 'TTLYY', '2', '阿托伐他汀'), ('58', 'TTLYY', '3', '普伐他汀'), ('59', 'TTLYY', '4', '洛伐他汀'), ('60', 'TTLYY', '5', '氟伐他汀'), ('61', 'TTLYY', '6', '匹伐他汀'), ('62', 'TTLYY', '7', '瑞舒伐他汀'), ('63', 'TTLYY', '8', '血脂康'), ('64', 'TTLYY', '9', '不适用'), ('65', 'JYYY', '1', 'CCB'), ('66', 'JYYY', '2', 'ARB'), ('67', 'JYYY', '3', 'ACEI'), ('68', 'JYYY', '4', 'β受体阻滞剂'), ('69', 'JYYY', '5', '利尿剂'), ('70', 'GMBW', '1', 'LM 左主干'), ('71', 'GMBW', '2', 'LAD 前降支'), ('72', 'GMBW', '3', 'RCA 右冠'), ('73', 'GMBW', '4', 'Dia 对角支'), ('74', 'GMBW', '5', 'OM 钝缘支'), ('75', 'GMBW', '6', 'PDA 后降支'), ('76', 'GMBW', '7', 'PDA 左室后支'), ('77', 'GMBW', '8', '其他'), ('78', 'XX', '1', 'A'), ('79', 'XX', '2', 'B'), ('80', 'XX', '3', 'AB'), ('81', 'XX', '4', 'O'), ('82', 'CYZD', '1', '稳定型心绞痛'), ('83', 'CYZD', '2', '不稳定型心绞痛'), ('84', 'CYZD', '3', '非ST段抬高型心肌梗死'), ('85', 'CYZD', '4', 'ST段抬高型心肌梗死'), ('86', 'CYZD', '5', '高血压病'), ('87', 'CYZD', '6', '风湿性心脏病'), ('88', 'CYZD', '7', '扩张性心肌病'), ('89', 'CYZD', '8', '其他'), ('90', 'CYDY', '1', '阿司匹林'), ('91', 'CYDY', '2', '氯吡格雷'), ('92', 'CYDY', '3', 'β受体阻滞剂'), ('93', 'CYDY', '4', '硝酸酯'), ('94', 'CYDY', '5', '他汀类'), ('95', 'CYDY', '6', 'ACEI'), ('96', 'CYDY', '7', 'ARB'), ('97', 'CYDY', '8', '抗心律失常药物'), ('98', 'CYDY', '9', 'CCB'), ('99', 'CYDY', '10', '地高辛'), ('100', 'CYDY', '11', '利尿剂'), ('101', 'CYDY', '12', '中成药'), ('102', 'CYDY', '13', '法华林'), ('103', 'XSBY', '1', '高血压'), ('104', 'XSBY', '2', '心脏瓣膜病'), ('105', 'XSBY', '3', '扩心病'), ('106', 'XSBY', '5', '冠心病'), ('107', 'XSBY', '5', '其他'), ('108', 'XSLX', '1', '收缩型'), ('109', 'XSLX', '2', '舒张型'), ('110', 'XS', '1', '左心衰'), ('111', 'XS', '2', '右心衰'), ('112', 'XS', '3', '全心衰'), ('113', 'XGN', '1', 'I'), ('114', 'XGN', '2', 'II'), ('115', 'XGN', '3', 'III'), ('116', 'XGN', '4', 'IV'), ('117', 'KILLIP', '1', 'I'), ('118', 'KILLIP', '2', 'II'), ('119', 'KILLIP', '3', 'III'), ('120', 'KILLIP', '4', 'IV'), ('121', 'XGBW', '1', '前间壁'), ('122', 'XGBW', '2', '前壁'), ('123', 'XGBW', '3', '广泛前壁'), ('124', 'XGBW', '4', '高侧壁'), ('125', 'XGBW', '5', '下壁'), ('126', 'XGBW', '6', '右室'), ('127', 'XGBW', '7', '正后壁'), ('128', 'XGLX', '1', 'ST段抬高心肌梗死'), ('129', 'XGLX', '2', '非ST段抬高心肌梗死'), ('130', 'SPLX', '1', '室上速'), ('131', 'SPLX', '2', '房颤（房扑）'), ('132', 'SPLX', '3', '室早'), ('133', 'SPLX', '4', '室速'), ('134', 'ZRQBQYY', '1', '病态窦房结综合征'), ('135', 'ZRQBQYY', '2', '房室传导阻滞'), ('136', 'ZRQBQYY', '3', '室速'), ('137', 'ZRQBQYY', '4', '心衰'), ('138', 'QBQLX', '1', '单腔起搏器'), ('139', 'QBQLX', '2', '双腔起搏器'), ('140', 'QBQLX', '3', 'ICD'), ('141', 'QBQLX', '4', 'CRT(D)'), ('142', 'SWFS', '1', '心源性'), ('143', 'SWFS', '2', '非心源性'), ('144', 'ZZSS', '4', '脑梗塞'), ('145', 'ZZSS', '4', '脑出血'), ('146', 'HOSPITAL', '1', '重医大附一院'), ('147', 'HOSPITAL', '2', '重庆市第八人民医院'), ('148', 'HOSPITAL', '3', '金山医院'), ('149', 'HOSPITAL', '4', '大足医院'), ('150', 'HOSPITAL', '5', '綦江医院'), ('151', 'HOSPITAL', '6', '万盛医院'), ('152', 'HOSPITAL', '7', '酉阳医院'), ('153', 'HOSPITAL', '8', '合川医院');
COMMIT;

-- ----------------------------
--  Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `code` varchar(4) NOT NULL COMMENT '菜单code',
  `group` varchar(4) NOT NULL COMMENT '父级菜单code',
  `name` varchar(50) NOT NULL COMMENT '菜单显示名称',
  `url` text NOT NULL COMMENT '菜单链接',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `menu`
-- ----------------------------
BEGIN;
INSERT INTO `menu` VALUES ('1', '1000', '0', '总览', '/admin/dashboard'), ('2', '1010', '1', '病例列表', '/admin/patient'), ('3', '1011', '1', '病例新增', '/admin/patient/add'), ('4', '1020', '2', '随访列表', '#'), ('5', '1021', '2', '到期已填写', '#'), ('6', '1022', '2', '到期未填写', '#'), ('7', '1023', '2', '过期随访', '#'), ('8', '1030', '3', '数据分析', '#'), ('9', '1040', '4', '用户管理', '/admin/user'), ('10', '1041', '4', '医院管理', '/admin/hospital');
COMMIT;

-- ----------------------------
--  Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `code` int(2) NOT NULL,
  `name` varchar(20) NOT NULL COMMENT '角色名称',
  `permission` text NOT NULL COMMENT '角色权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='角色管理';

-- ----------------------------
--  Records of `role`
-- ----------------------------
BEGIN;
INSERT INTO `role` VALUES ('1', '0', '超级管理员', '0,1,2,3,4'), ('2', '1', '管理员', '0,1,2,3,4'), ('3', '2', '主任', '0,1,2,3'), ('4', '3', '医生', '0,1,2');
COMMIT;

-- ----------------------------
--  Table structure for `share`
-- ----------------------------
DROP TABLE IF EXISTS `share`;
CREATE TABLE `share` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `hospital` varchar(4) NOT NULL COMMENT '病历提供医院',
  `target_hospital` varchar(4) NOT NULL COMMENT '病历分享到医院',
  `permission` varchar(10) NOT NULL COMMENT '病历分享到医院所拥有权限',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='病历分享表';

SET FOREIGN_KEY_CHECKS = 1;
