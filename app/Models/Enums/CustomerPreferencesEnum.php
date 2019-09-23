<?php

namespace App\Models\Enums;

/**
 * Class CustomerPreferencesEnum
 * @package App\Models\Enums
 */
abstract class CustomerPreferencesEnum
{
    const REPORT_REGULAR_MONITORING     = "report_regular_monitoring";
    const REPORT_DAILY_REPORT           = "report_daily_report";
    const REPORT_DAILY_REPORT_AT        = "report_daily_report_at";
    const REPORT_DAILY_REPORT_FREQUENCY = "report_daily_report_frequency";
    const REPORT_DAILY_REPORT_TO        = "report_daily_report_to";

    const SHIPPER_CONTACTS         = "shipper_contacts";
    const AGENT_ORIGIN_CONTACTS    = "agent_origin_contacts";
    const CUSTOMER_REPORT_CONTACTS = "customer_report_contacts";

    /**
     * preferencias do usuario para estimativa
     */
    const AGENT_DESTINATION_SET = "agent_destination_set";
    const INSURANCE_ALIQUOT_SET = "insurance_aliquot_set";

    const WAREHOUSE_SET = "warehouse_set";
    const CARRIAGE_SET  = "carriage_set";

    /**
     * final preferencias do usuario para estimativa
     */

    const REPORT_WEEKDAY    = "report_weekday";
    const REPORT_TIMETABLES = "report_timetables";
    const REPORT_WHO_GET    = "report_who_get";

    const OPERATION_TYPE         = "operation_type";
    const OPERATION_TYPE_DIRETA  = "direta";
    const OPERATION_TYPE_CONTA_ORDEM = "conta_ordem";
    const OPERATION_TYPE_ENCOMENDA  = "encomenda";

    const TRANSPORT_TYPE         = "transport_type";
    const TRANSPORT_TYPE_AIR     = "air";
    const TRANSPORT_TYPE_SEA     = "sea";
    const TRANSPORT_TYPE_ROAD    = "road";

    const DEMURRAGE_SHOW_INFORMATION     = "demurrage_show_information";
    const DEMURRAGE_OPTIONS              = "demurrage_options";
    const DEMURRAGE_SEND_BEFORE_DUE_DATE = "demurrage_send_before_due_date";
    const DEMURRAGE_WHO_GET              = "demurrage_who_get";
    const DEMURRAGE_AUTOMATIC_SPAWNING   = "demurrage_automatic_spawning";
    const DEMURRAGE_DEADLINE             = "demurrage_deadline";

    const SMART_DAY_DECISION_MAKE = "smart_day_decision_make";
    const INSURANCE_MADE_BY_DATI  = "insurance_made_by_dati";

    /**
     * @var array
     */
    protected static $namesDescription = [
        self::REPORT_REGULAR_MONITORING      => "Envio do relatório periódico",
        self::REPORT_DAILY_REPORT            => "Relatório diário",
        self::DEMURRAGE_SHOW_INFORMATION     => "Mostrar informação",
        self::DEMURRAGE_OPTIONS              => "Opções",
        self::DEMURRAGE_SEND_BEFORE_DUE_DATE => "Envio do email antes do vencimento",
        self::DEMURRAGE_WHO_GET              => "Quem recebe email",
        self::DEMURRAGE_AUTOMATIC_SPAWNING   => "Solicitar desova automatica?",
        self::DEMURRAGE_DEADLINE             => "Qual prazo?",
        self::SMART_DAY_DECISION_MAKE        => "Tomador de decisão",
        self::INSURANCE_MADE_BY_DATI         => "Seguro feito pela DATI",
        self::REPORT_DAILY_REPORT_AT         => "Qual horário de preferência?",
        self::REPORT_DAILY_REPORT_FREQUENCY  => "Qual a frequência que será enviado?",
        self::REPORT_DAILY_REPORT_TO         => "Quais os usuário que devem receber?"
    ];

    protected static $defaultOptions = [
        self::REPORT_REGULAR_MONITORING      => "yes",
        self::REPORT_DAILY_REPORT            => "yes",
        self::REPORT_DAILY_REPORT_FREQUENCY  => "monday;friday",
        self::REPORT_DAILY_REPORT_AT         => "06:00",
        self::REPORT_DAILY_REPORT_TO         => "",
        self::DEMURRAGE_SHOW_INFORMATION     => "yes",
        self::DEMURRAGE_OPTIONS              => "5",
        self::DEMURRAGE_SEND_BEFORE_DUE_DATE => "3d",
        self::DEMURRAGE_WHO_GET              => "",
        self::DEMURRAGE_AUTOMATIC_SPAWNING   => "yes",
        self::DEMURRAGE_DEADLINE             => "1d",
        self::SMART_DAY_DECISION_MAKE        => "customer",
        self::INSURANCE_MADE_BY_DATI         => "yes",
    ];

    protected static $allOptions = [
        self::REPORT_REGULAR_MONITORING      => ["yes","no"],
        self::REPORT_DAILY_REPORT            => ["yes","no"],
        self::REPORT_DAILY_REPORT_FREQUENCY  => ["monday", "friday", "tuesday", "wednesday", "thursday", "saturday"],
        self::REPORT_DAILY_REPORT_AT         => ["00:00-23:59"],
        self::REPORT_DAILY_REPORT_TO         => "",
        self::DEMURRAGE_SHOW_INFORMATION     => "yes",
        self::DEMURRAGE_OPTIONS              => "5",
        self::DEMURRAGE_SEND_BEFORE_DUE_DATE => ["1d", "2d", "3d"],
        self::DEMURRAGE_WHO_GET              => "",
        self::DEMURRAGE_AUTOMATIC_SPAWNING   => ["yes", "no"],
        self::DEMURRAGE_DEADLINE             => ["1d", "2d", "3d"],
        self::SMART_DAY_DECISION_MAKE        => ["customer", "dati"],
        self::INSURANCE_MADE_BY_DATI         => ["yes", "no"]
    ];

    /**
     * @return array
     */
    public static function estimatePreferences()
    {
       return [
           self::AGENT_DESTINATION_SET,
           self::CARRIAGE_SET,
           self::WAREHOUSE_SET,
           self::INSURANCE_ALIQUOT_SET
       ];
    }

    /**
     * @return array
     */
    public static function getDescriptions()
    {
        return self::$namesDescription;
    }

    /**
     * @return array
     */
    public static function getDefaultValues()
    {
        return self::$defaultOptions;
    }

    /**
     * @return array
     */
    public static function getTypeContacts()
    {
        return [
            self::CUSTOMER_REPORT_CONTACTS,
            self::SHIPPER_CONTACTS,
            self::AGENT_ORIGIN_CONTACTS
        ];
    }
}
