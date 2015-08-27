<?php
/** 
 * /app/Model/Validate.php
 */
class Validate extends AppModel
{
    public $useTable = false;
    public $_schema = array(
        'name' => array('type' => 'string', 'length' =>20),
        'furi' => array('type' => 'string', 'length' =>20),
        'mail' => array('type' => 'string', 'length' =>100),
        'zipcode' => array('type' => 'string', 'length' =>7),
        'pref' => array('type' => 'string', 'length' =>5),
        'city' => array('type' => 'string', 'length' =>10),
        'add1' => array('type' => 'string', 'length' =>20),
        'add2' => array('type' => 'string', 'length' =>20),
        'inq' => array('type' => 'text'),
    );
    
    
    public $validate = array(
        //名前ヴァリデーション
        'name' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => '未入力です。',
                'required' => true
            ),
            'nameRule' => array(
                'rule' => '/^[ぁ-んァ-ヶー一-龠]{0,20}$/u',
                'message' => '名前は全角で20文字以内で入力してください。',
                'required' => true
            )
        ),
        //フリガナヴァリデーション
        'furi' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => '未入力です。',
                'required' => true
            ),
            'furiRule' => array(
                'rule' => '/\A[\x{30A1}-\x{30FC}().-]{0,20}$/u',
                'message' => 'フリガナは全角カタカナで10文字以内で入力してください。',
                'required' => true
            )
        ),
        //メールヴァリデーション
        'mail' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => '未入力です。',
                'required' => true
            ),
            'email' => array(
                'rule' => array('email'),
                'message' => 'メールアドレス以外が入力されています',
                'required' => true
            ),
            'maxLength' => array(
                'rule' => array('maxLength',100),
                'message' => '100文字以内で入力してください',
                'required' => true
            )
        ),
        //郵便番号ヴァリデーション
        'zipcode' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => '未入力です。',
                'required' => true
            ),
            'zipRule' => array(
                'rule' => '/^\d{7}$/',
                'message' => '郵便番号は半角で７ケタ入力してください。',
                'required' => true
            ) 
        ),
        //都道府県ヴァリデーション
        'pref' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => '未入力です。',
                'required' => true
            ),
            'maxLength' => array(
                'rule' => '/^[ぁ-んァ-ヶー一-龠]{0,5}$/u',
                'message' => '都道府県名は正しく入力してください。',
                'required' => true
            )
            
        ),
        
        //市区町村ヴァリデーション
        'city' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => '未入力です。',
                'required' => true
            ),
            'cityRule' => array(
                'rule' => '/^[ぁ-んァ-ヶー一-龠]{0,10}$/u',
                'message' => '市区町村は全角で10文字以内で入力してください。',
                'required' => true
            )
        ),
        //住所１ヴァリデーション
        'add1' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                'message' => '未入力です。',
                'required' => true
            ),
            'add1Rule' => array(
                'rule' => '/^[ぁ-んァ-ヶー一-龠]{0,20}$/u',
                'message' => '住所1は全角で20文字以内で入力してください。',
                'required' => true
            )
        ),
        //住所２ヴァリデーション
        'add2' => array(
            'maxLength' => array(
                'rule' => '/^.{0,20}$/u',
                'message' => '住所2は20文字以内で入力してください',
                'required' => true
            )
        ),
        //問い合わせ内容ヴァリデーション
        'inq' => array(
            'maxLength' => array(
                'rule' => '/^.{0,1000}$/u',
                'message' => 'お問い合わせ内容は1000文字以内で入力してください。',
                'required' => true
            )
        ),
    );
              
}