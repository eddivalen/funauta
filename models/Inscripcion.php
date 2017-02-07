<?php
namespace app\models\form;

use app\models\Paciente;
use app\models\Institucion;
use Yii;
use yii\base\Model;
use yii\widgets\ActiveForm;

class Inscripcion extends \yii\db\ActiveRecord
{
    private $_paciente;
    private $_institucion;

    public function rules()
    {
        return [
            [['Institucion'], 'required'],
            [['Paciente'], 'safe'],
        ];
    }

    public function afterValidate()
    {
        $error = false;
        if (!$this->institucion->validate()) {
            $error = true;
        }
        if (!$this->paciente->validate()) {
            $error = true;
        }
        if ($error) {
            $this->addError(null); // add an empty error to prevent saving
        }
        parent::afterValidate();
    }

    public function save()
    {
        if (!$this->validate()) {
            return false;
        }
        $transaction = Yii::$app->db->beginTransaction();
        if (!$this->institucion->save()) {
            $transaction->rollBack();
            return false;
        }
        $this->paciente->ico_id = $this->institucion->id;
        if (!$this->paciente->save(false)) {
            $transaction->rollBack();
            return false;
        }
        $transaction->commit();
        return true;
    }
    // get de Institucion
    public function getPacientes()
    {
        return $this->_institucion;
    }
    //set de institucion
    public function setInstitucion($institucion)
    {
        if ($institucion instanceof Institucion) {
            $this->_institucion = $institucion;
        } else if (is_array($institucion)) {
            $this->_institucion->setAttributes($institucion);
        }
    }
    // get de paciente
    public function getPaciente()
    {
        if ($this->_paciente === null) {
            if ($this->institucion->isNewRecord) {
                $this->_paciente = new Paciente();
                $this->_paciente->loadDefaultValues();
            } else {
                $this->_paciente = $this->institucion->paciente;
            }
        }
        return $this->_paciente;
    }

    public function setPaciente($paciente)
    {
        if (is_array($paciente)) {
            $this->paciente->setAttributes($institucion);
        } elseif ($paciente instanceof Paciente) {
            $this->_paciente = $paciente;
        }
    }

    public function errorSummary($form)
    {
        $errorLists = [];
        foreach ($this->getAllModels() as $id => $model) {
            $errorList = $form->errorSummary($model, [
                'header' => '<p>Please fix the following errors for <b>' . $id . '</b></p>',
            ]);
            $errorList = str_replace('<li></li>', '', $errorList); // remove the empty error
            $errorLists[] = $errorList;
        }
        return implode('', $errorLists);
    }

    private function getAllModels()
    {
        return [
            'Institucion' => $this->institucion,
            'Paciente' => $this->paciente,
        ];
    }
}

