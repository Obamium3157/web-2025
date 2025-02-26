PROGRAM TestGetQueryStringParameter(INPUT, OUTPUT);
USES 
  DOS;
  
FUNCTION GetQueryParameter(Key: STRING): STRING;
VAR
  Query, Temp: STRING;
BEGIN
  Query := GetEnv('QUERY_STRING'); 
  Temp := Query;
  IF Pos(Key, Query) = 0
  THEN
    Result := ''
  ELSE
    BEGIN
       Delete(Temp, 0, Length(Key) + Pos(Key, Query) + 1);
       IF Pos('&', Temp) = 0
       THEN
         Result := Copy(Temp, 1, Length(Temp))
       ELSE
         Result := Copy(Temp, 1, Pos('&', Temp) - 1)
    END
END;

BEGIN
  WRITELN('Content-Type: text/plain');
  WRITELN;
  WRITELN('First Name: ', GetQueryParameter('first_name'));
  WRITELN('Last Name: ', GetQueryParameter('last_name'));
  WRITELN('Age: ', GetQueryParameter('age'))
END.
