# 통신 메세지
## userController
### login
- A200: 성공
- A400: 비어있음
- A404: 값 없음

### emailCheck
- A200: 이메일 전송 완료
- A400: 값이 비어있음
- A404: 이메일 전송 실패

### emailAuthCheck
- A200: 이메일 인증 성공
- A400: 이메일 인증 실패

### signUp
- A200: 성공
- A400: 비어있음
- A500: 에러

### doubleCheck
- A200: 성공
- A409: 중복

### findEmail
- A200: 성공
- A400: 비어있음
- A404: 못 찾음

## fridgeController
### saveFridge 
- A200: 성공
- A500: 삭제 또는 삽입 실패

### resetFridge
- A200: 초기화 성공
- A500: 초기화 실패