<?php

namespace App\Models\Enums;

/**
 * Class SubstatusEnum
 *
 * @package App\Models\Enums
 */
abstract class TypeEnum extends BasicMethodsEnums
{
    const TYPE_WAREHOUSE         = "warehouse";
    const TYPE_CARRIAGE          = "carriage";
    const TYPE_CUSTOMER          = "customer";
    const TYPE_SHIPPER           = "shipper";
    const TYPE_AGENT_ORIGIN      = "agent_origin";
    const TYPE_AGENT_DESTINATION = "agent_destination";
    const TYPE_INSURANCE_COMPANY = "insurance_company";
    const TYPE_EXCHANGE_BROKER   = "exchange_broker";
    const TYPE_SUPPLY            = "supply";

    const ORIGIN      = "origin";
    const DESTINATION = "destination";

    const TYPE_PERSONAL_ACCOUNT_BANK = "personal_account_bank";

    const TYPE_CREDIT = "credit";
    const TYPE_DEBIT  = "debit";

    const JOB_FUNCTION_TRAINEE   = "trainee";
    const JOB_FUNCTION_ASSISTANT = "assistant";
    const JOB_FUNCTION_ANALYST   = "analyst";
    const JOB_FUNCTION_MANAGER   = "manager";
    const JOB_FUNCTION_DIRECTOR  = "director";
    const JOB_FUNCTION_OWNER     = "owner";
    const JOB_FUNCTION_OTHER     = "other";

    const INCOTERM_FCA = "FCA";
    const INCOTERM_FAS = "FAS";
    const INCOTERM_FOB = "FOB";
    const INCOTERM_CFR = "CFR";
    const INCOTERM_CIF = "CIF";
    const INCOTERM_CPT = "CPT";
    const INCOTERM_CIP = "CIP";
    const INCOTERM_DDP = "DDP";
    const INCOTERM_DAT = "DAT";
    const INCOTERM_DAP = "DAP";

    const OPERATION_DIRETA      = "direta";
    const OPERATION_CONTA_ORDEM = "conta_ordem";
    const OPERATION_ENCOMENDA   = "encomenda";

    const PERIODO_MANHA = 'manha';
    const PERIODO_TARDE = 'tarde';
    const PERIODO_NOITE = 'noite';

    const TRANSPORT_AIR  = "air";
    const TRANSPORT_BOTH = "both";
    const TRANSPORT_SEA  = "sea";
    const TRANSPORT_ROAD = "road";

    const DI_CANAL_WAITING = 'waiting';
    const DI_CANAL_GREEN   = 'green';
    const DI_CANAL_YELLOW  = 'yellow';
    const DI_CANAL_RED     = 'red';
    const DI_CANAL_GRAY    = 'gray';

    const CONTAINER_LCL = "LCL";
    const CONTAINER_40  = "40";
    const CONTAINER_20  = "20";

    const STATUS_OPENED   = "opened";
    const STATUS_APPROVED = "approved";

    const EMAIL_SUBACTION_EMAIL    = "email_subaction_email";
    const EMAIL_SUBACTION_FILE     = "email_subaction_file";
    const EMAIL_SUBACTION_CALENDAR = "email_subaction_calendar";

    const TYPE_OPERATION_DIRETA      = "direta";
    const TYPE_OPERATION_ENCOMENDA   = "encomenda";
    const TYPE_OPERATION_CONTA_ORDEM = "conta_e_ordem";

    const TYPE_RADAR_EXPRESS   = "express";
    const TYPE_RADAR_LIMITED   = "limited";
    const TYPE_RADAR_UNLIMITED = "unlimited";

    const TYPE_TAX_FRAMEWORK_SN = "simples_nacional";
    const TYPE_TAX_FRAMEWORK_LP = "lucro_presumido";
    const TYPE_TAX_FRAMEWORK_LR = "lucro_real";

    const TYPE_MATRIZ = "matriz";
    const TYPE_FILIAL = "filial";

    const TYPE_LI_POS = "pos";
    const TYPE_LI_PRE = "pre";

    const TYPE_DISPATCHING_MODE_NORMAL      = "normal";
    const TYPE_DISPATCHING_MODE_ANTICIPATED = "anticipated";

    const TYPE_APPLICATION_PRODUCT_CONSUMPTION = "consumption";
    const TYPE_APPLICATION_PRODUCT_RESALE      = "resale";

    const TYPE_CONDITION_PRODUCT_USED     = "used";
    const TYPE_CONDITION_PRODUCT_NOT_USED = "not_used";

    const STATUS_PAID       = "paid";
    const STATUS_TO_PAY     = "toPay";
    const STATUS_TO_RECEIVE = "toReceive";
    const STATUS_RECEIVED   = "received";

    const TYPE_ANSWER_FAIL = "2";
    const TYPE_BOOLEAN_SIM = "1";
    const TYPE_BOOLEAN_NAO = "0";

    const TYPE_ENABLE  = "enable";
    const TYPE_DISABLE = "disable";

    const TYPE_BR  = "ptbr";
    const TYPE_EUA = "eua";

    const PRODUCT_COLUMN_VALUE  = "product_value";
    const PRODUCT_COLUMN_WEIGHT = "product_weight";
    const PRODUCT_COLUMN_NONE   = "product_none";

    const CHARGE_BY_PERCENTAGE = "charge_by_percentage";
    const CHARGE_BY_BOX        = "charge_by_box";
    const CHARGE_BY_CONTAINER  = "charge_by_container";
    const CHARGE_BY_TON        = "charge_by_ton";
    const CHARGE_BY_KG         = "charge_by_kg";
    const CHARGE_BY_M3         = "charge_by_m3";
    const CHARGE_BY_UN         = "charge_by_un";
    const CHARGE_BY_PALLET     = "charge_by_pallet";

    const WAREHOUSE_COST_TIME_ZERO         = "0d";
    const WAREHOUSE_COST_TIME_ONE          = "1d";
    const WAREHOUSE_COST_TIME_TWO          = "2d";
    const WAREHOUSE_COST_TIME_THREE        = "3d";
    const WAREHOUSE_COST_TIME_FOUR         = "4d";
    const WAREHOUSE_COST_TIME_FIVE         = "5d";
    const WAREHOUSE_COST_TIME_SIX          = "6d";
    const WAREHOUSE_COST_TIME_SEVEN        = "7d";
    const WAREHOUSE_COST_TIME_EIGHT        = "8d";
    const WAREHOUSE_COST_TIME_NINE         = "9d";
    const WAREHOUSE_COST_TIME_TEN          = "10d";
    const WAREHOUSE_COST_TIME_ELEVEN       = "11d";
    const WAREHOUSE_COST_TIME_TWELVE       = "12d";
    const WAREHOUSE_COST_TIME_THIRTEEN     = "13d";
    const WAREHOUSE_COST_TIME_FOURTEEN     = "14d";
    const WAREHOUSE_COST_TIME_FIFTEEN      = "15d";
    const WAREHOUSE_COST_TIME_SIXTEEN      = "16d";
    const WAREHOUSE_COST_TIME_SEVENTEEN    = "17d";
    const WAREHOUSE_COST_TIME_EIGHTEEN     = "18d";
    const WAREHOUSE_COST_TIME_NINETEEN     = "19d";
    const WAREHOUSE_COST_TIME_TWENTY       = "20d";
    const WAREHOUSE_COST_TIME_TWENTY_ONE   = "21d";
    const WAREHOUSE_COST_TIME_TWENTY_TWO   = "22d";
    const WAREHOUSE_COST_TIME_TWENTY_THREE = "23d";
    const WAREHOUSE_COST_TIME_TWENTY_FOUR  = "24d";
    const WAREHOUSE_COST_TIME_TWENTY_FIVE  = "25d";
    const WAREHOUSE_COST_TIME_TWENTY_SIX   = "26d";
    const WAREHOUSE_COST_TIME_TWENTY_SEVEN = "27d";
    const WAREHOUSE_COST_TIME_TWENTY_EIGHT = "28d";
    const WAREHOUSE_COST_TIME_TWENTY_NINE  = "29d";
    const WAREHOUSE_COST_TIME_THIRTY       = "30d";

    const CUSTOMER_SERVICE           = "customer_service";
    const ASSISTANT_CUSTOMER_SERVICE = "assistant_customer_service";

    const ACTION_SUCCESS = "action_success";
    const ACTION_FAIL    = "action_fail";

    const WAREHOUSE_SIDE_LEFT  = "warehouse_side_left";
    const WAREHOUSE_SIDE_RIGHT = "warehouse_side_right";

    const FREIGHT_CAR_TYPE_TRUCK      = 'truck';
    const FREIGHT_CAR_TYPE_VAN        = 'van';
    const FREIGHT_CAR_TYPE_LITTLE_VAN = 'little_van';

    const CATEGORY_TRANSACTION_NUMERARIO         = 'numerario';
    const CATEGORY_TRANSACTION_TAX               = 'tax';
    const CATEGORY_TRANSACTION_OTHERS            = 'others';
    const CATEGORY_TRANSACTION_FREIGHT           = 'freight';
    const CATEGORY_TRANSACTION_AGENT_DESTINATION = 'agent_destination';
    const CATEGORY_TRANSACTION_WAREHOUSE         = 'warehouse';

    const FILE_APROVATION_BL               = 'bl';
    const FILE_APROVATION_INVOICE          = 'invoice_packing';
    const FILE_APROVATION_DRAFT_DI         = 'draft_di';
    const FILE_APROVATION_DRAFT_NF_ENTRADA = 'draft_nf_entrada';
    const FILE_APROVATION_DRAFT_NF_SAIDA   = 'draft_nf_saida';
    const FILE_APROVATION_NF_SAIDA         = 'nf_saida';

    const TODO_TYPE_CS        = 'cs';
    const TODO_TYPE_ASSISTANT = 'assistant';
    const TODO_TYPE_BASE      = 'base';
    const TODO_TYPE_FINANCIAL = 'financeiro';
    const TODO_TYPE_DATI      = 'dati';


    /**
     * @var array
     */
    protected static $names = [
        self::TYPE_WAREHOUSE         => "Armazém",
        self::TYPE_CARRIAGE          => "Transportadora",
        self::TYPE_CUSTOMER          => "Cliente",
        self::TYPE_SHIPPER           => "Remetente",
        self::TYPE_AGENT_ORIGIN      => "Agente de Origem",
        self::TYPE_AGENT_DESTINATION => "Agente de Destino",
        self::TYPE_INSURANCE_COMPANY => "Compania de Seguros",
        self::TYPE_EXCHANGE_BROKER   => "Corretor de Câmbio",
        self::TYPE_SUPPLY            => "Fornecedor",

        self::ORIGIN      => "Origem",
        self::DESTINATION => "Destino",

        self::TYPE_PERSONAL_ACCOUNT_BANK => "Conta Pessoal",

        self::TYPE_CREDIT => "Crédito",
        self::TYPE_DEBIT  => "Débito",

        self::JOB_FUNCTION_TRAINEE   => "Estagiário",
        self::JOB_FUNCTION_ASSISTANT => "Assistente",
        self::JOB_FUNCTION_ANALYST   => "Analista",
        self::JOB_FUNCTION_MANAGER   => "Gerente",
        self::JOB_FUNCTION_DIRECTOR  => "Diretor",
        self::JOB_FUNCTION_OWNER     => "Proprietário",
        self::JOB_FUNCTION_OTHER     => "Outro",

        self::INCOTERM_FCA => "FCA",
        self::INCOTERM_FAS => "FAS",
        self::INCOTERM_FOB => "FOB",
        self::INCOTERM_CFR => "CFR",
        self::INCOTERM_CIF => "CIF",
        self::INCOTERM_CPT => "CPT",
        self::INCOTERM_CIP => "CIP",
        self::INCOTERM_DDP => "DDP",
        self::INCOTERM_DAT => "DAT",
        self::INCOTERM_DAP => "DAP",

        self::WAREHOUSE_SIDE_RIGHT => "Direita",
        self::WAREHOUSE_SIDE_LEFT  => "Esquerda",

        self::OPERATION_DIRETA      => "Direta",
        self::OPERATION_CONTA_ORDEM => "Conta e Ordem",
        self::OPERATION_ENCOMENDA   => "Encomenda",

        self::PERIODO_MANHA => 'Manhã',
        self::PERIODO_TARDE => 'Tarde',
        self::PERIODO_NOITE => 'Noite',

        self::TRANSPORT_AIR  => "Aéreo",
        self::TRANSPORT_BOTH => "Ambos",
        self::TRANSPORT_SEA  => "Marítmo",
        self::TRANSPORT_ROAD => "Rodoviário",

        self::DI_CANAL_WAITING => 'Aguardando',
        self::DI_CANAL_GREEN   => 'Verde',
        self::DI_CANAL_YELLOW  => 'Amarelo',
        self::DI_CANAL_RED     => 'Vermelho',
        self::DI_CANAL_GRAY    => 'Cinza',

        self::CONTAINER_LCL => "Carga Solta (LCL)",
        self::CONTAINER_40  => "40 pés",
        self::CONTAINER_20  => "20 pés",

        self::STATUS_OPENED   => "Aberto",
        self::STATUS_APPROVED => "Aprovado",

        self::TYPE_OPERATION_DIRETA      => "Direta",
        self::TYPE_OPERATION_ENCOMENDA   => "Encomenda",
        self::TYPE_OPERATION_CONTA_ORDEM => "Conta e Ordem",

        self::TYPE_RADAR_EXPRESS   => "Expressa",
        self::TYPE_RADAR_LIMITED   => "Limitada",
        self::TYPE_RADAR_UNLIMITED => "Ilimitada",

        self::TYPE_TAX_FRAMEWORK_SN => "Simples Nacional",
        self::TYPE_TAX_FRAMEWORK_LP => "Lucro Presumido",
        self::TYPE_TAX_FRAMEWORK_LR => "Lucro Real",

        self::TYPE_MATRIZ => "Matriz",
        self::TYPE_FILIAL => "Filial",

        self::TYPE_LI_POS => "Pós",
        self::TYPE_LI_PRE => "Pré",

        self::TYPE_DISPATCHING_MODE_NORMAL      => "Normal",
        self::TYPE_DISPATCHING_MODE_ANTICIPATED => "Antecipada",

        self::TYPE_APPLICATION_PRODUCT_CONSUMPTION => "Consumo",
        self::TYPE_APPLICATION_PRODUCT_RESALE      => "Revenda",

        self::TYPE_CONDITION_PRODUCT_USED     => "Usada",
        self::TYPE_CONDITION_PRODUCT_NOT_USED => "Não Usada",

        self::STATUS_PAID       => "Pago",
        self::STATUS_TO_PAY     => "A Pagar",
        self::STATUS_TO_RECEIVE => "A Receber",
        self::STATUS_RECEIVED   => "Recebido",

        self::TYPE_BOOLEAN_SIM => "Sim",
        self::TYPE_BOOLEAN_NAO => "Não",

        self::TYPE_ENABLE  => "Ativo",
        self::TYPE_DISABLE => "Inativo",

        self::PRODUCT_COLUMN_VALUE  => "Valor do produto",
        self::PRODUCT_COLUMN_WEIGHT => "Peso do produto",
        self::PRODUCT_COLUMN_NONE   => "A definir",

        self::CHARGE_BY_PERCENTAGE => "Porcentagem",
        self::CHARGE_BY_BOX        => "Caixa",
        self::CHARGE_BY_CONTAINER  => "Container",
        self::CHARGE_BY_TON        => "Tonelada",
        self::CHARGE_BY_PALLET     => "Pallet",
        self::CHARGE_BY_KG         => "Kilos",
        self::CHARGE_BY_M3         => "Metro Cúbico",
        self::CHARGE_BY_UN         => "Unidade",

        self::EMAIL_SUBACTION_EMAIL => "Emails",
        self::EMAIL_SUBACTION_FILE  => "Arquivos",

        self::WAREHOUSE_COST_TIME_ONE          => "1 dia",
        self::WAREHOUSE_COST_TIME_TWO          => "2 dias",
        self::WAREHOUSE_COST_TIME_THREE        => "3 dias",
        self::WAREHOUSE_COST_TIME_FOUR         => "4 dias",
        self::WAREHOUSE_COST_TIME_FIVE         => "5 dias",
        self::WAREHOUSE_COST_TIME_SIX          => "6 dias",
        self::WAREHOUSE_COST_TIME_SEVEN        => "7 dias",
        self::WAREHOUSE_COST_TIME_EIGHT        => "8 dias",
        self::WAREHOUSE_COST_TIME_NINE         => "9 dias",
        self::WAREHOUSE_COST_TIME_TEN          => "10 dias",
        self::WAREHOUSE_COST_TIME_ELEVEN       => "11 dias",
        self::WAREHOUSE_COST_TIME_TWELVE       => "12 dias",
        self::WAREHOUSE_COST_TIME_THIRTEEN     => "13 dias",
        self::WAREHOUSE_COST_TIME_FOURTEEN     => "14 dias",
        self::WAREHOUSE_COST_TIME_FIFTEEN      => "15 dias",
        self::WAREHOUSE_COST_TIME_SIXTEEN      => "16 dias",
        self::WAREHOUSE_COST_TIME_SEVENTEEN    => "17 dias",
        self::WAREHOUSE_COST_TIME_EIGHTEEN     => "18 dias",
        self::WAREHOUSE_COST_TIME_NINETEEN     => "19 dias",
        self::WAREHOUSE_COST_TIME_TWENTY       => "20 dias",
        self::WAREHOUSE_COST_TIME_TWENTY_ONE   => "21 dias",
        self::WAREHOUSE_COST_TIME_TWENTY_TWO   => "22 dias",
        self::WAREHOUSE_COST_TIME_TWENTY_THREE => "23 dias",
        self::WAREHOUSE_COST_TIME_TWENTY_FOUR  => "24 dias",
        self::WAREHOUSE_COST_TIME_TWENTY_FIVE  => "25 dias",
        self::WAREHOUSE_COST_TIME_TWENTY_SIX   => "26 dias",
        self::WAREHOUSE_COST_TIME_TWENTY_SEVEN => "27 dias",
        self::WAREHOUSE_COST_TIME_TWENTY_EIGHT => "28 dias",
        self::WAREHOUSE_COST_TIME_TWENTY_NINE  => "29 dias",
        self::WAREHOUSE_COST_TIME_THIRTY       => "30 dias",


        self::ACTION_SUCCESS => "sucesso",
        self::ACTION_FAIL    => "falha",

        self::FREIGHT_CAR_TYPE_TRUCK      => 'Caminhão',
        self::FREIGHT_CAR_TYPE_VAN        => 'Van',
        self::FREIGHT_CAR_TYPE_LITTLE_VAN => 'Fiorino',

        self::CATEGORY_TRANSACTION_NUMERARIO         => 'Numerário',
        self::CATEGORY_TRANSACTION_TAX               => 'Imposto',
        self::CATEGORY_TRANSACTION_OTHERS            => 'Outros',
        self::CATEGORY_TRANSACTION_FREIGHT           => 'Frete',
        self::CATEGORY_TRANSACTION_AGENT_DESTINATION => 'Agente de Carga',
        self::CATEGORY_TRANSACTION_WAREHOUSE         => 'Armazenagem',

        self::FILE_APROVATION_BL               => 'BL',
        self::FILE_APROVATION_INVOICE          => 'Invoice/Packing',
        self::FILE_APROVATION_DRAFT_DI         => 'Rascunho DI',
        self::FILE_APROVATION_DRAFT_NF_ENTRADA => 'Rascunho NF de Entrada',
        self::FILE_APROVATION_DRAFT_NF_SAIDA   => 'Rascunho NF de Saída',
        self::FILE_APROVATION_NF_SAIDA         => 'NF de Saída',

        self::TODO_TYPE_CS        => 'Customer Service',
        self::TODO_TYPE_ASSISTANT => 'Assistente - CS',
        self::TODO_TYPE_BASE      => 'Base',
        self::TODO_TYPE_FINANCIAL => 'Financeiro',
        self::TODO_TYPE_DATI      => 'Dati',
    ];

    /**
     * @param $name
     *
     * @return mixed
     */
    public static function getTypeName($name)
    {
        return static::$names[$name];
    }

    /**
     * @param $types
     *
     * @return array
     */
    public static function names($types)
    {
        $names = [];
        foreach ($types as $type) {
            if (!array_key_exists($type, static::$names)) {
                $names[$type] = "$type not declared";
                continue;
            }
            $names[$type] = static::$names[$type];
        }
        return $names;
    }

    /**
     * @return array
     */
    public static function typesAccount()
    {
        return [
            self::TYPE_SUPPLY,
            self::TYPE_CUSTOMER,
            self::TYPE_PERSONAL_ACCOUNT_BANK,
        ];
    }

    /**
     * @return array
     */
    public static function getTypesEmailSubAction()
    {
        return [
            self::EMAIL_SUBACTION_FILE,
            self::EMAIL_SUBACTION_EMAIL,
            self::EMAIL_SUBACTION_CALENDAR,
        ];
    }

    /**
     * @return array
     */
    public static function productColumn()
    {
        return [
            self::PRODUCT_COLUMN_VALUE,
            self::PRODUCT_COLUMN_WEIGHT,
            self::PRODUCT_COLUMN_NONE
        ];
    }

    /**
     * @return array
     */
    public static function actionStatus()
    {
        return [
            self::ACTION_SUCCESS,
            self::ACTION_FAIL
        ];
    }

    /**
     * @return array
     */
    public static function getTypeWareHouseCost()
    {
        return [
            self::WAREHOUSE_SIDE_LEFT,
            self::WAREHOUSE_SIDE_RIGHT,
        ];
    }

    /**
     * @return array
     */
    public static function getWarehouseCostTime()
    {
        return [
            self::WAREHOUSE_COST_TIME_ZERO,
            self::WAREHOUSE_COST_TIME_ONE,
            self::WAREHOUSE_COST_TIME_TWO,
            self::WAREHOUSE_COST_TIME_THREE,
            self::WAREHOUSE_COST_TIME_FOUR,
            self::WAREHOUSE_COST_TIME_FIVE,
            self::WAREHOUSE_COST_TIME_SIX,
            self::WAREHOUSE_COST_TIME_SEVEN,
            self::WAREHOUSE_COST_TIME_EIGHT,
            self::WAREHOUSE_COST_TIME_NINE,
            self::WAREHOUSE_COST_TIME_TEN,
            self::WAREHOUSE_COST_TIME_ELEVEN,
            self::WAREHOUSE_COST_TIME_TWELVE,
            self::WAREHOUSE_COST_TIME_THIRTEEN,
            self::WAREHOUSE_COST_TIME_FOURTEEN,
            self::WAREHOUSE_COST_TIME_FIFTEEN,
            self::WAREHOUSE_COST_TIME_SIXTEEN,
            self::WAREHOUSE_COST_TIME_SEVENTEEN,
            self::WAREHOUSE_COST_TIME_EIGHTEEN,
            self::WAREHOUSE_COST_TIME_NINETEEN,
            self::WAREHOUSE_COST_TIME_TWENTY
        ];
    }

    /**
     * @return array
     */
    public static function chargeBy()
    {
        return [
            self::CHARGE_BY_PERCENTAGE,
            self::CHARGE_BY_UN,
            self::CHARGE_BY_KG,
            self::CHARGE_BY_M3,
            self::CHARGE_BY_PALLET,
            self::CHARGE_BY_BOX,
            self::CHARGE_BY_CONTAINER,
            self::CHARGE_BY_TON,
        ];
    }

    /**
     * @return array
     */
    public static function typesAccountTransaction()
    {
        return [
            self::TYPE_CREDIT,
            self::TYPE_DEBIT,
        ];
    }

    /**
     * @return array
     */
    public static function typeEnableDisable()
    {
        return [
            self::TYPE_ENABLE,
            self::TYPE_DISABLE
        ];
    }

    /**
     * @return array
     */
    public static function getTypeLanguage()
    {
        return [
            self::TYPE_BR,
            self::TYPE_EUA
        ];
    }

    /**
     * @return array
     */
    public static function typesCompany()
    {
        return [
            self::TYPE_WAREHOUSE,
            self::TYPE_CARRIAGE,
            self::TYPE_CUSTOMER,
            self::TYPE_SHIPPER,
            self::TYPE_AGENT_ORIGIN,
            self::TYPE_AGENT_DESTINATION,
            self::TYPE_INSURANCE_COMPANY,
            self::TYPE_EXCHANGE_BROKER,
            self::TYPE_SUPPLY,
        ];
    }

    /**
     * @return array
     */
    public static function jobFunctions()
    {
        return [
            self::JOB_FUNCTION_TRAINEE,
            self::JOB_FUNCTION_ASSISTANT,
            self::JOB_FUNCTION_ANALYST,
            self::JOB_FUNCTION_MANAGER,
            self::JOB_FUNCTION_DIRECTOR,
            self::JOB_FUNCTION_OWNER,
            self::JOB_FUNCTION_OTHER,
        ];
    }

    /**
     * @return array
     */
    public static function incoterms()
    {
        return [
            self::INCOTERM_FCA,
            self::INCOTERM_FAS,
            self::INCOTERM_FOB,
            self::INCOTERM_CFR,
            self::INCOTERM_CIF,
            self::INCOTERM_CPT,
            self::INCOTERM_CIP,
            self::INCOTERM_DDP,
            self::INCOTERM_DAT,
            self::INCOTERM_DAP,
        ];
    }

    /**
     * @return array
     */
    public static function operationTypes()
    {
        return [
            self::OPERATION_DIRETA,
            self::OPERATION_CONTA_ORDEM,
            self::OPERATION_ENCOMENDA,
        ];
    }

    /**
     * @return array
     */
    public static function mapaPeriodo()
    {
        return [
            self::PERIODO_MANHA,
            self::PERIODO_TARDE,
            self::PERIODO_NOITE,
        ];
    }

    /**
     * @return array
     */
    public static function getDirection()
    {
        return [
            self::ORIGIN,
            self::DESTINATION
        ];
    }

    /**
     * @return array
     */
    public static function transportTypes()
    {
        return [
            self::TRANSPORT_AIR,
            self::TRANSPORT_SEA,
            self::TRANSPORT_ROAD,
        ];
    }

    public static function diCanal()
    {
        return [
            self::DI_CANAL_WAITING,
            self::DI_CANAL_GREEN,
            self::DI_CANAL_YELLOW,
            self::DI_CANAL_RED,
            self::DI_CANAL_GRAY,

        ];
    }

    /**
     * @return array
     */
    public static function containers()
    {
        return [
            "",
            self::CONTAINER_LCL,
            self::CONTAINER_40,
            self::CONTAINER_20,
        ];
    }

    /**
     * @return array
     */
    public static function statusCostEstimate()
    {
        return [
            self::STATUS_OPENED,
            self::STATUS_APPROVED,
        ];
    }

    /**
     * @return array
     */
    public static function operationTypesCustomer()
    {
        return [
            self::TYPE_OPERATION_DIRETA,
            self::TYPE_OPERATION_ENCOMENDA,
            self::TYPE_OPERATION_CONTA_ORDEM,
        ];
    }

    /**
     * @return array
     */
    public static function radarTypes()
    {
        return [
            self::TYPE_RADAR_EXPRESS,
            self::TYPE_RADAR_LIMITED,
            self::TYPE_RADAR_UNLIMITED,
        ];
    }

    /**
     * @return array
     */
    public static function getTypeUserCustomer()
    {
        return [
            self::CUSTOMER_SERVICE,
            self::ASSISTANT_CUSTOMER_SERVICE
        ];
    }

    /**
     * @return array
     */
    public static function taxFrameworks()
    {
        return [
            self::TYPE_TAX_FRAMEWORK_SN,
            self::TYPE_TAX_FRAMEWORK_LP,
            self::TYPE_TAX_FRAMEWORK_LR,
        ];
    }

    /**
     * @return array
     */
    public static function typesOffice()
    {
        return [
            self::TYPE_MATRIZ,
            self::TYPE_FILIAL,
        ];
    }

    /**
     * @return array
     */
    public static function liTypes()
    {
        return [
            self::TYPE_LI_POS,
            self::TYPE_LI_PRE,
        ];
    }

    /**
     * @return array
     */
    public static function dispatchingModes()
    {
        return [
            self::TYPE_DISPATCHING_MODE_NORMAL,
            self::TYPE_DISPATCHING_MODE_ANTICIPATED,
        ];
    }

    /**
     * @return array
     */
    public static function getModal(){
        return [
            self::TRANSPORT_SEA,
            self::TRANSPORT_AIR,
            self::TRANSPORT_BOTH
        ];
    }

    /**
     * @return array
     */
    public static function applicationProducts()
    {
        return [
            self::TYPE_APPLICATION_PRODUCT_CONSUMPTION,
            self::TYPE_APPLICATION_PRODUCT_RESALE,
        ];
    }

    /**
     * @return array
     */
    public static function conditionProducts()
    {
        return [
            self::TYPE_CONDITION_PRODUCT_USED,
            self::TYPE_CONDITION_PRODUCT_NOT_USED,
        ];
    }

    /**
     * @return array
     */
    public static function statusTransaction()
    {
        return [
            self::STATUS_PAID,
            self::STATUS_TO_PAY,
            self::STATUS_TO_RECEIVE,
            self::STATUS_RECEIVED,
        ];
    }

    /**
     * @return array
     */
    public static function typeBoolean()
    {
        return [
            self::TYPE_BOOLEAN_SIM,
            self::TYPE_BOOLEAN_NAO,
        ];
    }

    public static function getThreeTypes()
    {
        return [
            self::TYPE_BOOLEAN_SIM,
            self::TYPE_BOOLEAN_NAO,
            self::TYPE_ANSWER_FAIL,
        ];
    }

    public static function carType()
    {
        return [
            self::FREIGHT_CAR_TYPE_TRUCK,
            self::FREIGHT_CAR_TYPE_VAN,
            self::FREIGHT_CAR_TYPE_LITTLE_VAN,
        ];
    }

    public static function categoryTransaction()
    {
        return [
            self::CATEGORY_TRANSACTION_NUMERARIO,
            self::CATEGORY_TRANSACTION_TAX,
            self::CATEGORY_TRANSACTION_OTHERS,
            self::CATEGORY_TRANSACTION_FREIGHT,
            self::CATEGORY_TRANSACTION_AGENT_DESTINATION,
            self::CATEGORY_TRANSACTION_WAREHOUSE,
        ];
    }

    public static function fileAprovation()
    {
        return [
            self::FILE_APROVATION_BL,
            self::FILE_APROVATION_INVOICE,
            self::FILE_APROVATION_DRAFT_DI,
            self::FILE_APROVATION_DRAFT_NF_ENTRADA,
            self::FILE_APROVATION_DRAFT_NF_SAIDA,
            self::FILE_APROVATION_NF_SAIDA,
        ];
    }

    public static function todoType()
    {
        return [
            self::TODO_TYPE_CS,
            self::TODO_TYPE_ASSISTANT,
            self::TODO_TYPE_BASE,
            self::TODO_TYPE_FINANCIAL,
            self::TODO_TYPE_DATI,
        ];
    }
}
